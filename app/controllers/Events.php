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
class Events extends BASE_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('events_model');

    }

    /*
     * Default method for this controller - Login
     */
    function index()
    {
        $this->data['events'] = $this->events_model->fetch_allEvents();
        $this->data['pg_title'] = "Events";
        $this->data['page_content'] = 'events/index';
        $this->load->view('layout/template', $this->data);

    }

    function addEvent()
    {
        $this->data['pg_title'] = "Add Event";
        $this->data['page_content'] = 'events/add';
        $this->load->view('layout/formtemplate', $this->data);
    }

    function addRequest()
    {
        $this->data['pg_title'] = "Add Request";
        $this->data['page_content'] = 'requests/addRequest';
        $this->load->view('layout/formtemplate', $this->data);
    }

    function storeEvent()
    {
        $forminput = $this->input->post();

        $product = $forminput['eventName'];
        $i = 0;
        foreach ($product as $key ) {
            // $prod = $key[$i];
            $this->db->insert('events', ['eventName' => $key]);
            $i++;
        }

        $inserted = $this->db->affected_rows();

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Event Added Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Please Try Again');
        }
        redirect('events/index');
    }

    function editProduct($id)
    {
        $this->data['product'] = $this->products_model->get($id);
        $this->data['pg_title'] = "Edit Production";
        $this->data['page_content'] = 'events/edit';
        $this->load->view('layout/template', $this->data);
    }

    function delete($id)
    {
        $product = $this->events_model->delete($id);
        $this->session->set_flashdata('success-msg', 'Event deleted Successfully');
        redirect (base_url('events/index'));
    }

}