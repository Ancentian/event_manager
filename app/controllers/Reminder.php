<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('events_model', 'events');
        $this->load->model('customers_model', 'customers');
        $this->load->model('inventory_model', 'inventory');
        $this->load->model('requests_model', 'requests');
        $this->load->model('reminder_model', 'reminder');
        $this->load->model('employee_model');
        $this->load->model('send_message');
    }

    public function sendReminder()
    {
        $events = $this->reminder->fetch_allEventRequests();

        foreach($events as $key)
        {
            $returnDate = $key['date_of_return'];
            $custName = $key['customerName'];
            $rec = $key['phoneNumber'];//Customer Phone Number
            $date = date("Y-m-d", strtotime("+1 days"));
            $longDateFormat = date("F jS, Y", strtotime($date));

            $smsadmins = $this->employee_model->fetch_admin();
            $admin = $smsadmins['recipients'];
            //var_dump($smsadmins);die;
        if($date == $returnDate)
        {
            $msg = "AUTOMATED REMINDERS
Java Event Hive
Dear $custName,
You are Reminded to Return Event Items by Tomorrow, $longDateFormat.
Thank You for Your Support.";
            $msg2 = "AUTOMATED REMINDERS
Java Event Hive
Dear Admin,
Your Client $custName, Should Return the event Items by Tomorrow, $longDateFormat.
Thank You.";
        $this->send_message->send($msg, $rec);
        //$this->send_message->sendtoAdmin($msg2, $admin);
        }
        }

        

        
    }
	
}
