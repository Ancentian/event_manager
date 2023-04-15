<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_URI $uri
 * @property CI_Config $config
 * @property CI_DB_mysqli_driver $db
 * @property CI_Form_validation $form_validation
 * @property CI_Security $security
 *
 * This class manages all user module related functions.
 * Data is managed by sending CURL requests to the API; to the relevant endpoint
 */
class Dashboard extends BASE_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('users_model');
        $this->load->model('summary_model');

    }

    /*
     * Default method for this controller - Login
     */
    function index()
    {
        $this->data['todaysIncome'] = $this->summary_model->fetch_todaysIncome();
         $this->data['totalIncome'] = $this->summary_model->total_income();
        $this->data['allRequests'] = $this->summary_model->all_event_requests();
        $this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'admin/dashboard';
        $this->load->view('layout/template', $this->data);

    }

    function myprofile()
    {
        $this->data['pg_title'] = "My Profile";
        $this->data['page_content'] = 'admin/myprofile';
        $this->load->view('layout/template', $this->data);
    }

    function updatepass()
    {
        $forminput = $this->input->post();
        // echo $forminput['pconfirm']."<br>".$forminput['password'];
        // die;
        if ($forminput['password'] != $forminput['pconfirm']) {
            $this->session->set_flashdata('error-msg', 'Passwords do not match!');
            redirect('dashboard/myprofile');
        }
        $inserted = $this->users_model->updatepass($forminput['password']);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Password updated successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('dashboard/myprofile');
    }


}