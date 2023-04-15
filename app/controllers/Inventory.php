<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('inventory_model', 'inventory');
        $this->load->model('requests_model', 'requests');
        $this->load->model('events_model', 'events');
    }

    /*
       Display all records in page
    */
    public function index()
    {
        $this->data['items'] = $this->inventory->get_allItems();
        $this->data['pg_title'] = "Inventory";
        $this->data['page_content'] = 'inventory/index';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Create a record page
    */
    public function add()
    {
        $this->data['pg_title'] = "Add";
        $this->data['page_content'] = 'inventory/add';
        $this->load->view('layout/formtemplate', $this->data);
    }

    public function edit()
    {
        $this->data['pg_title'] = "Add";
        $this->data['page_content'] = 'inventory/edit';
        $this->load->view('layout/formtemplate', $this->data);
    }

    /*
      Save the submitted record
    */
   function storeItem()
    {
        $forminput = $this->input->post();
        $item = $forminput['itemName'];
        $i = 0;
        foreach ($item as $key ) {
            // $prod = $key[$i];
            $this->db->insert('inventories', ['itemName' => $key]);
            $i++;
        }
        $inserted = $this->db->affected_rows();

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Items Added Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Please Try Again');
        }
        redirect(base_url('inventory/index'));
    }

        public function itemsReturn($id)
    {
        $this->data['requests'] = $this->requests->get_requestByID($id);
        $this->data['items'] = $this->requests->get_itemsbyRequestID($id);
        //var_dump($this->data['requests']);die;
        $this->data['pg_title'] = "Request Details";
        $this->data['page_content'] = 'requests/itemsReturn';
        $this->load->view('layout/template', $this->data);
    }

    public function store_itemsReturned()
    {
        $forminput = $this->input->post();

        $request_id = $forminput['request_id'];
        $returned_on = $forminput['returned_on'];
        $item_id = $forminput['item_id'];
        $items_col = $forminput['items_collected'];
        $items_rtned = $forminput['items_returned'];
        $status = $forminput['status'];
        $comments = $forminput['comments'];
        $user = $this->session->userdata('user_aob')->id;
        if($forminput['items_returned'] == $forminput['items_collected'])
        {
            $value = '1';
        } elseif($forminput['items_returned'] != $forminput['items_collected'])
        {
            $value = '3';
        }
        
        //var_dump($forminput);die;
        $i = 0;
        foreach ($item_id as $key) {
            $itemCol = $items_col[$i];
            $itemRtn = $items_rtned[$i];
            $stsus = $status[$i];
            $this->db->insert('event_items_returned', ['request_id' => $request_id, 'returned_on' => $returned_on, 'item_id' => $key, 'items_collected' => $itemCol, 'items_returned' => $itemRtn, 'status'=> $stsus, 'comments' => $comments,'return_value' =>$value, 'user_id' =>$user]);
            $i++;
        }
        $inserted = $this->db->affected_rows();

        //var_dump($inserted);die;

        if ($inserted > 0 ) {
            $this->session->set_flashdata('success-msg', 'Items Return Recorded Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Try Again');
        }
        return redirect(base_url('inventory/returnedItems'));

    }

    public function returnedItems()
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['events'] = $this->inventory->fetch_eventRequests($sdate, $edate);
        //var_dump($this->data['events'][0]);die;
        $this->data['pg_title'] = "Request Report";
        $this->data['page_content'] = 'inventory/returnedItems';
        $this->load->view('layout/template', $this->data);
    }

    public function viewReturnedItems($id)
    {
        $this->data['requests'] = $this->inventory->get_requestByID($id);
        $this->data['items'] = $this->inventory->get_itemsbyRequestID($id);
        //var_dump($this->data['items']);die;
        $this->data['pg_title'] = "Request Report";
        $this->data['page_content'] = 'inventory/viewReturnedItems';
        $this->load->view('layout/template', $this->data);
    }

    public function editReturnedItems($id)
    {
        $this->data['requests'] = $this->requests->get_requestByID($id);
        $this->data['items'] = $this->requests->get_editItemsbyRequestID($id);
        //var_dump($this->data['items']);die;
        $this->data['pg_title'] = "Request Details";
        $this->data['page_content'] = 'inventory/editReturnedItems';
        $this->load->view('layout/template', $this->data);
    }
    /*
      Delete a record
    */
    public function delete($id)
    {
        $item = $this->inventory->delete($id);
        $this->session->set_flashdata('success', "Item Deleted Successfully!");
        redirect(base_url('inventory/index'));
    }


}