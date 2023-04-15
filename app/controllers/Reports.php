<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('events_model', 'events');
        $this->load->model('customers_model', 'customers');
        $this->load->model('collection_model', 'collection');
        $this->load->model('reports_model', 'reports');
        $this->load->model('summary_model', 'summary');
        $this->load->model('inventory_model', 'inventory');
        $this->load->model('employee_model');
        $this->load->model('send_message');
    }

    /*
       Display all records in page
    */
    public function requestReports()
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['events'] = $this->reports->fetch_allEventRequests($sdate, $edate);
        //var_dump($this->data['events'][11]);die;
        $this->data['pg_title'] = "Request Report";
        $this->data['page_content'] = 'reports/requestReports';
        $this->load->view('layout/template', $this->data);
        
    }

    public function inventoryReport()
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['inventory'] = $this->reports->fetch_inventoryReport($sdate, $edate);
        $this->data['pg_title'] = "Request Report";
        $this->data['page_content'] = 'reports/inventoryReport';
        $this->load->view('layout/template', $this->data);
        
    }

    public function viewInventory($id)
    {
        $this->data['requests'] = $this->inventory->get_requestByID($id);
        $this->data['items'] = $this->inventory->get_itemsbyRequestID($id);
        //var_dump($this->data['items']);die;
        $this->data['pg_title'] = "Request Report";
        $this->data['page_content'] = 'reports/viewInventory';
        $this->load->view('layout/template', $this->data);
    }

    public function paymentReports()
    {
        $sdate = "";$edate = "";
        $forminput = $this->input->get();
        $sdate = $forminput['sdate'];
        $edate = $forminput['edate'];
        $this->data['payments'] = $this->reports->get_allPayments($sdate,$edate);
        $this->data['pg_title'] = "Payment Report";
        $this->data['page_content'] = 'reports/paymentReport';
        $this->load->view('layout/template', $this->data);
    }

    public function sendSummary()
    {
        $todaySales = $this->summary->fetch_todaysIncome();//paid
        $todaysProduction = $this->summary->all_productions_today();
        //var_dump($todaysProduction);die;
        $paidUnpaid = $this->summary->total_incomeProductions();//Total Income(Paid&UnPaid) since Prod Started
        $totalIncome = $this->summary->total_income();//Total Income(Paid) since Production Started
        //var_dump($paidUnpaid);die;
        $totalDue = $paidUnpaid - $totalIncome;
        //$tot = $todaySales + $totalIncome;

        //var_dump($tot);die;
        $time = date("h:i:sa");
        //$tm = "06:36:02pm";

        $smsadmins = $this->employee_model->fetch_admin();
        $rec = $smsadmins['recipients'];
        
         $msg = "AUTOMATED DAILY REPORTS
Embroidery
Today's Income $todaySales

GRAND TOTALS:
Total Income $paidUnpaid
Outstanding Debts: $totalDue
Paid Debts $totalIncome";
//var_dump($msg);die;

        $this->send_message->send($msg, $rec);
    }
    
    
    /*
      Delete a record
    */
    public function deletePayment($id)
    {
        $item = $this->reports->delete($id);
        $this->session->set_flashdata('success-msg', "Deleted Successfully!");
        redirect(base_url('reports/paymentReports'));
    }


}