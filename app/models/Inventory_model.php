<?php


class Inventory_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
    function get_allItems()
    {
        $this->db->select()->from('inventories');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_eventRequests($sdate, $edate)
    {
        $this->db->select('event_requests.*, customers.id as custID, customers.customerName,customers.phoneNumber, users.id as userID, users.firstname, users.lastname,event_items_returned.id evtRtdID, event_items_returned.request_id,event_items_returned.returned_on,event_items_returned.return_value');
        $this->db->from('event_requests');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        $this->db->join('users', 'users.id = event_requests.user_id');
        $this->db->join('event_items_returned', 'event_items_returned.request_id = event_requests.id','LEFT');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('event_requests.eventDate >=',$sdate);
            $this->db->where('event_requests.eventDate <',$edate);
        }
        $this->db->group_by('event_requests.id');
        $this->db->order_by('eventDate', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_requestByID($id)
    {
        $this->db->where('event_requests.id', $id);
        $this->db->select('event_requests.*,users.id as userID,users.firstname,users.lastname,customers.id as custID, customers.customerName,event_items_returned.id as evntItmID,event_items_returned.returned_on');
        $this->db->from('event_requests');
        // $this->db->join('event_items', 'event_items.request_id = event_requests.id'); 
        $this->db->join('users', 'users.id = event_requests.user_id');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        $this->db->join('event_items_returned', 'event_items_returned.request_id = event_requests.id','left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_itemsbyRequestID($id)
    {
        //var_dump($id);die;
        $this->db->where('event_items_returned.request_id', $id);
        $this->db->select('event_items_returned.*, inventories.id as invID,inventories.itemName,event_requests.id as evtRtdID, event_requests.total_billed');
        $this->db->from('event_items_returned');
        //$this->db->join('event_items', 'event_items.itemID = event_items_returned.item_id');
        $this->db->join('inventories','inventories.id = event_items_returned.item_id');
        $this->db->join('event_requests', 'event_requests.id = event_items_returned.request_id');
        //$this->db->group_by('event_items_returned.request_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    /*
        Store the record in the database
    */
    public function storeExpense($data)
    {
        $this->db->insert('expenses', $data);
        return $this->db->affected_rows();

    }

    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('expenses');
        $query = $this->db->get();
        return $query->result_array()[0];
    }


    /*
        Update or Modify a record in the database
    */
    public function update_expense($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('expenses', $data);
        return $this->db->affected_rows();
    }

    /*
        Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('inventories');
        return $this->db->affected_rows();
    }

}
?>