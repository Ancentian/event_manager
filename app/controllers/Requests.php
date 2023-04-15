<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Requests extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('events_model', 'events');
        $this->load->model('customers_model', 'customers');
        $this->load->model('inventory_model', 'inventory');
        $this->load->model('requests_model', 'requests');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        $this->data['events'] = $this->requests->fetch_allEventRequests();
        //var_dump($this->data['events']);die;
        $this->data['pg_title'] = "Requests";
        $this->data['page_content'] = 'requests/index';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Create a record page
    */
    public function addRequest()
    {
        $this->data['events'] = $this->events->fetch_allEvents();
        $this->data['customers'] = $this->customers->fetch_allCustomers();
        $this->data['items'] = $this->inventory->get_allItems();
        $this->data['pg_title'] = "Add Requests";
        $this->data['page_content'] = 'requests/addRequest';
        $this->load->view('layout/formtemplate', $this->data);
    }

    public function paymentDetails($id)
    {
        $this->data['requests'] = $this->inventory->get_requestByID($id);
        $this->data['items'] = $this->inventory->get_itemsbyRequestID($id);
        $this->data['payment'] = $this->requests->get_paymentDetails($id);
        $this->data['amount_paid'] = $this->requests->fetch_totPaymentByRequestID($id);
        //var_dump($this->data['requests']);die;
        $this->data['pg_title'] = "Add Payment";
        $this->data['page_content'] = 'requests/paymentDetails';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Save the submitted record
    */
    public function store_eventRequest()
    {
        $forminput = $this->input->post();

        $userID = $this->session->userdata('user_aob')->id;
        $customer = $forminput['customerID'];
        //$event = $forminput['eventID'];
        $date = $forminput['eventDate'];
        $location = $forminput['location'];
        $returnDate = $forminput['date_of_return'];
        $item = $forminput['itemID'];
        $number = $forminput['number_collected'];
        $amt = $forminput['amount'];
        $check = $forminput['check'];//Checks if pay mode and amount has values
        //Payments Inputs
        $mode = $forminput['pmnt_mode'];
        $amount_paid = $forminput['amount_paid'];

        //CALCULATES THE TOTAL OF EXPENSE AMOUNT
        $total = 0;
        foreach ($amt as $key ) {
            $total += $key;
        }
        //END OF CALCULATION

        $data = array('customerID' => $customer, 'eventDate' => $date, 'location' => $location, 'total_billed' => $total, 'date_of_return' => $returnDate, 'user_id' => $userID);
        $insert1 = $this->requests->storeRequest($data);
        $last_id = $this->db->insert_id();

        $i = 0;
        foreach($item as $key)
        {
            $noCollected = $number[$i];
            $amount = $amt[$i];
            $this->db->insert('event_items', ['request_id' => $last_id, 'itemID' => $key, 'number_collected' => $noCollected, 'amount' => $amount]);
            $i++;
        }
        //Payments Insert
        if($check == "1")
        {
            $x = 0;
            foreach ($mode as $key) {
            $amnt_paid = $amount_paid[$x];
            $this->db->insert('payments', ['request_id' => $last_id, 'pmnt_mode' => $key, 'amount_paid' => $amnt_paid, 'transaction_no' => $trans, 'received_by' => $userID]);
            $x++;
        }
        }

        $insert2 = $this->db->affected_rows();

        if ($insert1 > 0 && $insert2 > 0 ) {
            $this->session->set_flashdata('success-msg', 'Event Request Recorded Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('requests/index');  
    }

    public function addPayment()
    {
        $forminput = $this->input->post();

        $requestID = $forminput['request_id'];
        $mode = $forminput['pmnt_mode'];
        $amount = $forminput['amount_paid'];
        $userID = $this->session->userdata('user_aob')->id;
        $i = 0;
        foreach ($mode as $key) {
            $amnt = $amount[$i];
            $this->db->insert('payments', ['request_id' => $requestID, 'pmnt_mode' => $key, 'amount_paid' => $amnt, 'transaction_no' => $trans, 'received_by' => $userID]);
            $i++;
        }
        $inserted = $this->db->affected_rows();

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Payment Received Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect('requests/paymentDetails/'.$requestID);  
    }

    /*
      Edit a record page
    */
    public function viewRequest($id)
    {
        $this->data['requests'] = $this->requests->get_requestByID($id);
        $this->data['items'] = $this->requests->get_itemsbyRequestID($id);
        $this->data['payment'] = $this->requests->get_paymentDetails($id);
    //var_dump($this->data['requests']);die;
        $this->data['pg_title'] = "Request Details";
        $this->data['page_content'] = 'requests/viewRequest';
        $this->load->view('layout/template', $this->data);
    }

    public function editRequest($id)
    {
        $this->data['requests'] = $this->requests->get_requestByID($id);
        $this->data['items'] = $this->requests->get_itemsbyRequestID($id);
        //var_dump($this->data['requests']);die;
        $this->data['pg_title'] = "Request Details";
        $this->data['page_content'] = 'requests/editRequest';
        $this->load->view('layout/template', $this->data);
    }

    public function collectProducts($id)
    {
        $this->data['production'] = $this->production->get_production($id);
        //var_dump($this->data['production']);die;
        $this->data['pg_title'] = "Collect Products";
        $this->data['page_content'] = 'productions/collect';
        $this->load->view('layout/template', $this->data);
    }


    public function i_print($id)
    {     
        $data['request'] = $this->inventory->get_requestByID($id);
        //var_dump($data['request']);die;
        $this->data['items'] = $this->inventory->get_itemsbyRequestID($id);
        $data['payment'] = $this->requests->get_paymentDetails($id);
        $amountPaid = $this->requests->fetch_totPaymentByRequestID($id);
        $data['totalPaid'] = $amountPaid;

        
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
        $item = $this->requests->delete($id);
        $this->session->set_flashdata('success-msg', "Deleted Successfully!");
        redirect(base_url('requests/index'));
    }

    public function deletePayment($id)
    {
        $data_id = $this->uri->segment(4);
        //var_dump($data_id);die;
        $item = $this->requests->delete_payment($id);
        $this->session->set_flashdata('success-msg', "Payment Deleted Successfully!");
        return redirect('requests/paymentDetails/'.$data_id);
    }

} 