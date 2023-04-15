<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collection extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('production_model', 'production');
        $this->load->model('products_model', 'products');
        $this->load->model('customers_model', 'customers');
        $this->load->model('collection_model', 'collection');
        $this->load->model('reports_model', 'reports');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['production'] = $this->production->get_all($sdate, $edate);
        $this->data['pg_title'] = "Production";
        $this->data['page_content'] = 'productions/index';
        $this->load->view('layout/template', $this->data);
    }

    public function collectProducts($id)
    {
        $this->data['production'] = $this->collection->get_production($id);
        //var_dump($id);die;
        
        $this->data['pg_title'] = "Collect Products";
        $this->data['page_content'] = 'collection/index';
        $this->load->view('layout/template', $this->data);
    }

    public function paymentDetails($id)
    {
        $this->data['product'] = $this->collection->get_productDetails($id);
        //var_dump($id);die;
        $this->data['payment'] = $this->collection->get_paymentDetails($id);
        $this->data['pg_title'] = "Product Payments";
        $this->data['page_content'] = 'collection/paymentDetails';
        $this->load->view('layout/template', $this->data);
    }

    public function addPayment_()
    {
        $this->data['pg_title'] = "Add Payment";
        $this->data['page_content'] = 'productions/addPayment';
        $this->load->view('layout/template', $this->data);
    }

    public function collect($id)
    {
        $this->data['product'] = $this->collection->get_productDetails($id);
        $this->data['pg_title'] = "Collect";
        $this->data['page_content'] = 'collection/collect';
        $this->load->view('layout/template', $this->data);
    }

    public function collectedItems()
    {
        $this->data['collect'] = $this->collection->fetch_collectedItems();
        $this->data['pg_title'] = "Collections";
        $this->data['page_content'] = 'collection/collectedItems';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Save the submitted record
    */
    public function storeProducts()
    {
        $forminput = $this->input->post();

        $userID = $this->session->userdata('user_aob')->id;
        $customer = $forminput['customerId'];
        $product = $forminput['productId'];
        $logo = $forminput['logoName'];
        $qty = $forminput['quantity'];
        $itemPrice = $forminput['unit_price'];
        $totPrice = $forminput['total_price'];
        $paymentMode = $forminput['mode_of_payment'];
        $i = 0;
        foreach($customer as $key)
        {
            $prod = $product[$i];
            $logoName = $logo[$i];
            $oneqty = $qty[$i];
            $oneitem = $itemPrice[$i];
            $tot = $totPrice[$i];
            $this->db->insert('productions', ['user_id' => $userID, 'customerId' => $key, 'productId' => $prod, 'logoName' => $logoName, 'quantity' => $oneqty, 'unit_price' => $oneitem, 'total_price' => $tot]);
            $i++;
        }
        
        $inserted = $this->db->affected_rows();

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Production Added Successfully');
        }else{
            $this->sessison->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('production/index');  
    }

    public function addPayment()
    {
        $forminput = $this->input->post();

        $productionID = $forminput['production_id'];
        $mode = $forminput['pmnt_mode'];
        $amount = $forminput['amount_paid'];
        $userID = $this->session->userdata('user_aob')->id;
        $i = 0;
        foreach ($mode as $key) {
            $amnt = $amount[$i];
            $this->db->insert('payments', ['production_id' => $productionID, 'pmnt_mode' => $key, 'amount_paid' => $amnt, 'transaction_no' => $trans, 'received_by' => $userID]);
            $i++;
        }
        $inserted = $this->db->affected_rows();

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Payment Received Successfully');
        }else{
            $this->sessison->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('collection/paymentDetails/'.$productionID);  
    }

    function mark_collection()
    {
        $forminput = $this->input->post();

        $data = ['production_id' => $forminput['production_id'], 'collected_by' => $forminput['collected_by'], 'status' => $forminput['status']];

        $inserted = $this->collection->mark_collection($data);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Collection Marked Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Failed! Try Again');
        }
        return redirect('collection/collectedItems');
    }

    function r_print(int $id, int $prodid)
    {   
        $productions = $this->collection->get_production($id);
        $payments = $this->collection->get_paymentDetails($prodid);
        $single = $this->collection->fetch_singlePayment($id);
        $data['receipt'] = $single;
        //Payment History
        $totpaid = 0;
        $phistory = $this->reports->total_payment($prodid);
        foreach ($phistory as $one){
            $totpaid += $one['amount_paid'];
        }
        //Total Amount Billed
        $billed = $this->reports->total_billed($prodid);
        $total = $billed['total_price'];
        $data['totdue'] = $total - $totpaid;
        
        // boost the memory limit if it's low ;)
        ini_set('memory_limit', '64M');
        // load library
        $this->load->library('pdf');
        $this->pheight = 0;
        $this->load->library('pdf');
        $pdf = $this->pdf->load_thermal();
        // retrieve data from model or just static date
        $data['title'] = "items";
        $pdf->allow_charset_conversion = true;  // Set by default to TRUE
        $pdf->charset_in = 'UTF-8';
        //   $pdf->SetDirectionality('rtl'); // Set lang direction for rtl lang
        $pdf->autoLangToFont = true;
        $html = $this->load->view('printfiles/receipt', $data, true);
        $h = 160 + $this->pheight;
        //  $pdf->_setPageSize(array(70, $h), $this->orientation);
        $pdf->_setPageSize(array(70, $h), $pdf->DefOrientation);
        $pdf->WriteHTML($html);
        // render the view into HTML
        // write the HTML into the PDF
        $file_name = preg_replace('/[^A-Za-z0-9]+/', '-', 'ThermalInvoice_' . $id);
        if ($this->input->get('d')) {
            $pdf->Output($file_name . '.pdf', 'D');
        } else {
            $pdf->Output($file_name . '.pdf', 'I');
        }

        unlink('userfiles/temp/' . $data['qrc']);
    }

    public function i_print(int $prodid)
    {
        $amtpaid = 0;
        $phistory = $this->reports->total_payment($prodid);
        foreach ($phistory as $one){
            $amtpaid += $one['amount_paid'];
        }
        //var_dump($phistory[0]);die;
        $data['history'] =$this->reports->total_payment($prodid);


 
        $this->$data['hist'] =$this->reports->total_payment($prodid);

        //Total Amount Billed
        $billed = $this->reports->total_billed($prodid);
        $total = $billed['total_price'];
        $data['total'] = $total ;
        //var_dump($total);die;
        $data['totdue'] = $total - $amtpaid;

        
        // boost the memory limit if it's low ;)
        ini_set('memory_limit', '64M');
        // load library
        $this->load->library('pdf');
        $this->pheight = 0;
        $this->load->library('pdf');
        $pdf = $this->pdf->load_thermal();
        // retrieve data from model or just static date
        $data['title'] = "items";
        $pdf->allow_charset_conversion = true;  // Set by default to TRUE
        $pdf->charset_in = 'UTF-8';
        //   $pdf->SetDirectionality('rtl'); // Set lang direction for rtl lang
        $pdf->autoLangToFont = true;
        $html = $this->load->view('printfiles/invoice', $data, true);
        $h = 160 + $this->pheight;
        //  $pdf->_setPageSize(array(70, $h), $this->orientation);
        $pdf->_setPageSize(array(70, $h), $pdf->DefOrientation);
        $pdf->WriteHTML($html);
        // render the view into HTML
        // write the HTML into the PDF
        $file_name = preg_replace('/[^A-Za-z0-9]+/', '-', 'ThermalInvoice_' . $tid);
        if ($this->input->get('d')) {
            $pdf->Output($file_name . '.pdf', 'D');
        } else {
            $pdf->Output($file_name . '.pdf', 'I');
        }

        unlink('userfiles/temp/' . $data['qrc']);
    }

    
    /*
      Delete a record
    */
    public function delete($id)
    {
        $item = $this->production->delete($id);
        $this->session->set_flashdata('success-msg', "Deleted Successfully!");
        redirect(base_url('production/index'));
    }

    public function deletePayment($id)
    {
        $item = $this->collection->delete_payment($id);
        $this->session->set_flashdata('success-msg', "Deleted Successfully!");
        redirect(base_url('reports/paymentReport'));
    }


}