<?php


class Customers_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
    function fetch_allCustomers()
    {
        $this->db->select()->from('customers');
        $this->db->order_by('id', 'DESC');
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
        $result = $this->db->delete('customers', array('id' => $id));
        return $result;
    }

}
?>