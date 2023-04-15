<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result    Database
 * @property CI_Session $session
 **/
class Summary_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }
    function total_income()
    {
    	$query = $this->db->query('select *, sum(amount_paid) as totsum from payments');
        $info = $query->result_array();
        $totsold = $info[0]['totsum'];
        if(!$totsold){
                $totsold = 0;
        }
        return $totsold;
    }
    public function fetch_todaysIncome()//Used In dashBoard and Gives the total Figure
    {
        $this->db->where('created_at LIKE "'.date("Y-m-d").'%"');
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

    function all_event_requests()
    {
        $query = $this->db->query('select * from event_requests');
        $info = $query->result_array();
        $no = 0;
        $no = sizeof($info);
        return $no;
    }

    function all_todays_income()
    {
        $query = $this->db->query('select * from ticket_payments WHERE(created_at LIKE "'.date("Y-m-d").'%")');
        $info = $query->result_array();  
        // var_dump($info);die;      
        return $info;
    }

    function total_due($id)
    {
        $this->db->where('production_id', $id);
        $query = $this->db->query('select *, sum(amount_paid) as totpaid from payments');
        $info = $query->result_array();
        $totpaid = $info[0]['totpaid'];
        if(!$totpaid){
                $totpaid = 0;
        }
        return $totpaid;
    }

    //Total income from Production i.e. paid and Unpaid
    function total_incomeProductions()
    {
        //$this->db->where('created_at LIKE "'.date("Y-m-d").'%"');
        $this->db->select('sum(total_price) as tot')->from('productions');
        $query = $this->db->get();
        $tot = $query->row_array()['tot'];
        if($tot > 0){   
        }else{
            $tot = 0;
        }
        // echo $tot;die;
        return $tot;
    }


    function admitted_patients()
    {
    	$type = 'ibp';
    	$query = $this->db->query('select * from patients WHERE(type="'.$type.'")');
        $info = $query->result_array();

        $no = 0;
        $no = sizeof($info);
        return $no;
    }
    function patients_today()
    {
    	$query = $this->db->query('select * from patients WHERE(created_at LIKE "'.date("Y-m-d").'%")');
        $info = $query->result_array();
        $no = 0;
        $no = sizeof($info);
        return $no;
    }

}