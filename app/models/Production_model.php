<?php


class Production_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
    function get_all($sdate, $edate)
    {
        $this->db->select('productions.*, users.id as userID,users.firstname,users.lastname,products.id as prodID, products.productName,customers.id as custID, customers.customerName');
        $this->db->from('productions');
        $this->db->join('users', 'users.id = productions.user_id');
        $this->db->join('products', 'products.id = productions.productId');
        $this->db->join('customers', 'customers.id = productions.customerId');
        if($sdate != "" && $edate != ""){
            $edate = date('Y-m-d',strtotime($edate)+86400);
            $this->db->where('productions.created_at >=',$sdate);
            $this->db->where('productions.created_at <',$edate);
        }
        $this->db->order_by('productions.id', 'DESC');
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
        $this->db->where('id', $id);
        $this->db->delete('productions');

        $this->db->where('production_id', $id);
        $this->db->delete('payments');

        $this->db->where('production_id', $id);
        $this->db->delete('collections');
        return $this->db->affected_rows();
    }

}
?>