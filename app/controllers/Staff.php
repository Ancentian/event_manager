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
class Staff extends BASE_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_aob')) {
            $this->session->set_flashdata('error-msg', "You must login to continue!");
            redirect('user/index');
        }
        $this->load->model('staff_model');
        $this->load->model('departments_model');

    }

    function index()
    {
        $this->data['dpts'] = $this->departments_model->fetch_departments();
        $this->data['staff'] = $this->staff_model->fetch_staff();
        $this->data['pg_title'] = "Staff";
        $this->data['page_content'] = 'staff/index';
        $this->load->view('layout/template', $this->data);
    }


    function addstaff()
    {
        $this->data['dpts'] = $this->departments_model->fetch_departments();
        $this->data['pg_title'] = "Staff";
        $this->data['page_content'] = 'staff/addstaff';
        $this->load->view('layout/template', $this->data);
    }

    function editstaff(int $id)
    {
        $test = $this->staff_model->fetch_byId($id);
        if ($test) {
            $this->data['staff'] = $test[0];
        } else {
            $this->data['staff'] = [];
        }
        // echo json_encode($test[0]);die;
        $this->data['dpts'] = $this->departments_model->fetch_departments();
        $this->data['id'] = $id;
        $this->data['pg_title'] = "Staff";
        $this->data['page_content'] = 'staff/editstaff';
        $this->load->view('layout/template', $this->data);
    }

    function add()
    {
        $forminput = $this->input->post();

        $inserted = json_decode($this->staff_model->add_staff($forminput), true);
        if ($inserted['status'] == '1') {
            $this->session->set_flashdata('success-msg', $inserted['message']);
        } else {
            $this->session->set_flashdata('error-msg', $inserted['message']);
        }
        redirect('staff/index');

    }

    function edit(int $id)
    {
        $forminput = $this->input->post();

        $inserted = $this->staff_model->edit_staff($id, $forminput);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Staff updated successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('staff/index');
    }

    function delete(int $id)
    {
        $inserted = $this->staff_model->delete_staff($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Staff deleted successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('staff/index');
    }

}