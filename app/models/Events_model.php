<?php


class Events_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
    function fetch_allEvents()
    {
        $this->db->select()->from('events');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_eventRequests($sdate, $edate)
    {
        $this->db->select('event_requests.*, events.id as evtID, events.eventName, customers.id as custID, customers.customerName,customers.phoneNumber, users.id as userID, users.firstname, users.lastname,event_items_returned.id evtRtdID, event_items_returned.request_id,event_items_returned.return_value');
        $this->db->from('event_requests');
        $this->db->join('events', 'events.id = event_requests.eventID','LEFT');
        $this->db->join('customers', 'customers.id = event_requests.customerID','LEFT');
        $this->db->join('users', 'users.id = event_requests.user_id');
        $this->db->join('event_items_returned', 'event_items_returned.request_id = event_requests.id');
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
        $this->db->where('id', $id);
        $this->db->delete('events');
        return $this->db->affected_rows();
    }

}
?>