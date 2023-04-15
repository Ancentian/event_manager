<?php


class Requests_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
    function fetch_allEventRequests()
    {
        $this->db->select('event_requests.*,customers.id as custID, customers.customerName,customers.phoneNumber, users.id as userID, users.firstname, users.lastname,event_items_returned.id evtRtdID, event_items_returned.return_value');
        $this->db->from('event_requests');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        $this->db->join('users', 'users.id = event_requests.user_id');
        $this->db->join('event_items_returned', 'event_items_returned.request_id = event_requests.id', 'LEFT');
        $this->db->group_by('event_requests.id');
        $this->db->order_by('eventDate', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_requestByID($id)
    {
        $this->db->where('event_requests.id', $id);
        $this->db->select('event_requests.*,users.id as userID,users.firstname,users.lastname,customers.id as custID, customers.customerName');
        $this->db->from('event_requests');
        // $this->db->join('event_items', 'event_items.request_id = event_requests.id'); 
        $this->db->join('users', 'users.id = event_requests.user_id');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_itemsbyRequestID($id)
    {
        $this->db->where('event_items.request_id', $id);
        $this->db->select('event_items.*, event_requests.id as evntRqstID,inventories.id as invID,inventories.itemName');
        $this->db->from('event_items');
        $this->db->join('event_requests', 'event_requests.id = event_items.request_id');
        $this->db->join('inventories', 'inventories.id = event_items.itemID');
        $this->db->order_by('event_items.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_editItemsbyRequestID($id)
    {
        $this->db->where('event_requests.id', $id);
        $this->db->select('event_requests.*,events.id as evntID, events.eventName,customers.id as custID, customers.customerName, event_items_returned.id evtRtdID, event_items_returned.request_id,event_items_returned.item_id, event_items_returned.status,event_items_returned.return_value');
        $this->db->from('event_requests');
        // $this->db->join('event_items', 'event_items.request_id = event_requests.id'); 
        $this->db->join('events','events.id = event_requests.eventID');
       
        $this->db->join('customers', 'customers.id = event_requests.customerID','LEFT');
         $this->db->join('event_items_returned', 'event_items_returned.request_id = event_requests.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_paymentDetails($id)
    {
        $this->db->where('payments.request_id', $id);
        $this->db->select('payments.*, users.id as userID, users.firstname,users.lastname,event_requests.id as evntRqstID,event_requests.customerID,customers.id as custID,customers.customerName');
        $this->db->from('payments');
        $this->db->join('users', 'users.id = payments.received_by');
        $this->db->join('event_requests', 'event_requests.id = payments.request_id');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_totPaymentByRequestID($id)
    {
        $this->db->where('request_id', $id);
        $this->db->select('sum(amount_paid) as tot')->from('payments');
        $query = $this->db->get();
        $tot = $query->row_array()['tot'];
        if($tot > 0){   
        }else{
            $tot = 0;
        }
        // echo $tot;die;
        return $tot;
    }

    // public function fetch_customerby
    /*
        Store the record in the database
    */
    public function storeRequest($data)
    {
        $this->db->insert('event_requests', $data);
        return $this->db->affected_rows();
    }

    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('productions');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    public function get_production($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('productions');
        $query = $this->db->get();
        return $query->result_array()[0];
    }


    /*
        Update or Modify a record in the database
    */
    public function updateProd($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('productions', $data);
        return $this->db->affected_rows();
    }

    /*
        Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('productions');

        // $this->db->where('production_id', $id);
        // $this->db->delete('payments');

        $this->db->where('id', $id);
        $this->db->delete('event_requests');
        return $this->db->affected_rows();
    }

    public function delete_payment($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('payments');
        return $this->db->affected_rows();
    }

}
