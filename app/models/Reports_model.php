<?php


class Reports_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
        function fetch_allEventRequests($sdate, $edate)
    {
        $this->db->select('event_requests.*,customers.id as custID, customers.customerName,customers.phoneNumber, users.id as userID, users.firstname, users.lastname,event_items_returned.id evtRtdID, event_items_returned.return_value');
        $this->db->from('event_requests');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        $this->db->join('users', 'users.id = event_requests.user_id');
        $this->db->join('event_items_returned', 'event_items_returned.request_id = event_requests.id', 'LEFT');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('event_requests.eventDate >=',$sdate);
            $this->db->where('event_requests.eventDate <',$edate);
        }
        $this->db->group_by('event_requests.id');
        $this->db->order_by('eventDate', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_inventoryReport()
    {
        $this->db->select('event_requests.*,customers.id as custID, customers.customerName');
        $this->db->from('event_requests');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        //$this->db->join('events', 'events.id = event_requests.eventID');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_requestByID($id)
    {
        $this->db->where('event_requests.id', $id);
        $this->db->select('event_requests.*,users.id as userID,events.id as evntID, events.eventName, users.firstname,users.lastname,customers.id as custID, customers.customerName');
        $this->db->from('event_requests');
        // $this->db->join('event_items', 'event_items.request_id = event_requests.id'); 
        $this->db->join('events','events.id = event_requests.eventID');
        $this->db->join('users', 'users.id = event_requests.user_id');
        $this->db->join('customers', 'customers.id = event_requests.customerID','LEFT');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_itemsbyRequestID($id)
    {
        $this->db->where('event_items.request_id', $id);
        $this->db->select('event_items.*, event_requests.id as evntRqstID,inventories.id as invID,inventories.itemName,event_items_returned.id as evntitmID, event_items_returned.request_id,event_items_returned.items_collected,event_items_returned.items_returned, event_items_returned.return_value');
        $this->db->from('event_items');
        $this->db->join('event_requests', 'event_requests.id = event_items.request_id');
        $this->db->join('inventories', 'inventories.id = event_items.itemID');
        //$this->db->join('event_items_returned', 'event_items_returned.request_id = event_items.request_id');
        $this->db->group_by('event_items.request_id');
        $this->db->order_by('event_items.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_allPayments($sdate,$edate)
    {
        $this->db->select('payments.*, users.id as userID, users.firstname,users.lastname,event_requests.id as eventRqstID,event_requests.customerID,customers.id as custID, customers.customerName');
        $this->db->from('payments');
        $this->db->join('users', 'users.id = payments.received_by');
        $this->db->join('event_requests', 'event_requests.id = payments.request_id');
        // $this->db->join('products', 'products.id = productions.productId');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('payments.created_at >=',$sdate);
            $this->db->where('payments.created_at <',$edate);
        }
        $this->db->order_by('payments.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
        Store the record in the database
    */
    public function storeProduction($data)
    {
        $this->db->insert('productions', $data);
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

    function totalPayment($id)
    {
        $data = $this->get_production($id);
        $prodId = $data['id'];
        var_dump($prodId);die;
        $query = $this->db->query('select *, sum(amount_paid) as totsum from payments WHERE(production_id="'.$id.'")');
        $info = $query->result_array();
        $totsold = $info[0]['totsum'];
        if(!$totsold){
                $totsold = 0;
        }
        return $totsold;
    }

    /*
        Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('payments');
        return $this->db->affected_rows();
    }

}
?>