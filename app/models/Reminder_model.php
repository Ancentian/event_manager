<?php

class Reminder_model extends CI_Model{

    public function __construct()
    {

    }

    /*
        Get all the records from the database
    */
     public function fetch_allEventRequests()
    {
        $this->db->select('event_requests.*,customers.id as custID, customers.customerName,customers.phoneNumber, users.id as userID, users.firstname, users.lastname,event_items_returned.id evtRtdID, event_items_returned.return_value');
        $this->db->from('event_requests');
        $this->db->join('customers', 'customers.id = event_requests.customerID');
        $this->db->join('users', 'users.id = event_requests.user_id');
        $this->db->join('event_items_returned', 'event_items_returned.request_id = event_requests.id', 'LEFT');
        //$this->db->order_by('eventDate', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

}
?>
