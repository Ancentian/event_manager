<?php

class Employee_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }
    /*
        Get all the records from the database
    */
    public function fetch_employees()
    {
        $this->db->select()->from('users');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_mechanics()
    {
        $this->db->select()->from('mechanics');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    /*
        Store the record in the database
    */
    public function storeemployee($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }

    public function store_mechanic($data)
    {
        $this->db->insert('mechanics', $data);
        return $this->db->affected_rows();
    }

    function fetch_admin()
    {
        $this->db->limit(1);
        $query = $this->db->get('sms_recipients');
        return $query->row_array();
    }

    public function update_setAdmin($data)
    {
        $this->db->where('id', 1);
        $this->db->update('sms_recipients', $data);
            //return $this->db->affected_rows();    
    }

    function show_employee($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    function edit_employee($id, $data)
    {
        $this->db->where('id', $id);
        //$this->db->where('id', $this->session->userdata('user_aob')->id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    function edit_mechanic($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('mechanics', $data);
        return $this->db->affected_rows();
    }

    function fetch_byId($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('users');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

     function fetchprofile_byId($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('users');
        $query = $this->db->get();
        return $query->result()[0];
    }

    function fetch_mechanicById($id)
    {
        $this->db->where('id', $id);
        $this->db->select()->from('mechanics');
        $query = $this->db->get();
        return $query->result_array()[0];
    }
    /*
        Delete a record in the database
    */
    public function deleteemployee($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return $this->db->affected_rows();
    }

    function delete_mechanic($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mechanics');
        return $this->db->affected_rows();
    }

}
?>
