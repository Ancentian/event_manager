<?php


class Collection_model extends CI_Model{

    public function __construct()
    {

    }
    /*
        Get all the records from the database
    */
    public function get_production($prodid)
    {
        $this->db->where('customerId', $prodid);
        $this->db->select('productions.*, users.id as userID,users.firstname,users.lastname,products.id as prodID, products.productName,customers.id as custID, customers.customerName');
        $this->db->from('productions');
        $this->db->join('users', 'users.id = productions.user_id');
        $this->db->join('products', 'products.id = productions.productId');
        $this->db->join('customers', 'customers.id = productions.customerId');
        $this->db->order_by('productions.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_productDetails($id)
    {
        $this->db->where('productions.id', $id);
        $this->db->select('productions.*,products.id as prodID, products.productName');
        $this->db->from('productions');
        $this->db->join('products', 'products.id = productions.productId');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    public function fetch_singlePayment($id)
    {
        $this->db->where('payments.id', $id);
        $this->db->select('payments.*, users.id as userID, users.firstname,users.lastname,customers.id as custID,customers.customerName');
        $this->db->from('payments');
        $this->db->join('users', 'users.id = payments.received_by');
        $this->db->join('productions', 'productions.id = payments.production_id');
        $this->db->join('customers', 'customers.id = productions.customerId');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    public function get_paymentDetails($id)
    {
        $this->db->where('payments.production_id', $id);
        $this->db->select('payments.*, users.id as userID, users.firstname,users.lastname,productions.id as prodID,productions.customerId,customers.id as custID,customers.customerName');
        $this->db->from('payments');
        $this->db->join('users', 'users.id = payments.received_by');
        $this->db->join('productions', 'productions.id = payments.production_id');
        $this->db->join('customers', 'customers.id = productions.customerId');
        $query = $this->db->get();
        return $query->result_array();
    }
    //SindleProduction Payment
    public function fetch_prodPayment($id)
    {
        $this->db->where('payments.production_id', $id);
        $this->db->select('payments.*, users.id as userID, users.firstname,users.lastname,customers.id as custID,customers.customerName');
        $this->db->from('payments');
        $this->db->join('users', 'users.id = payments.received_by');
        $this->db->join('productions', 'productions.id = payments.production_id');
        $this->db->join('customers', 'customers.id = productions.customerId');
        $query = $this->db->get();
        return $query->result_array()[0];
    }
    /*
        Store the record in the database
    */
    public function mark_collection($data)
    {
        $this->db->insert('collections', $data);
        return $this->db->affected_rows();
    }

    public function fetch_collectedItems()
    {
        $this->db->select('collections.*,productions.id as prodID, productions.productId,products.id as pID, products.productName,customers.id as custID, customers.customerName');
        $this->db->from('collections');
        $this->db->join('productions', 'productions.id = collections.production_id');
        $this->db->join('products', 'products.id = productions.productId');
        $this->db->join('customers', 'customers.id = productions.customerId');
        $this->db->order_by('collections.id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();

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
        $result = $this->db->delete('productions', array('id' => $id));
        return $result;
    }

    public function delete_payment($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('payments');
        return $this->db->affected_rows();
    }

}
?>