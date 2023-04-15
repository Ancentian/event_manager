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
class Customers extends BASE_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('customers_model');

    }

    /*
     * Default method for this controller - Login
     */
    function index()
    {
        $this->data['customers'] = $this->customers_model->fetch_allCustomers();
        $this->data['pg_title'] = "Customers";
        $this->data['page_content'] = 'customers/index';
        $this->load->view('layout/template', $this->data);

    }

    function addCustomer()
    {
        $this->data['pg_title'] = "Add Customer";
        $this->data['page_content'] = 'customers/create';
        $this->load->view('layout/formtemplate', $this->data);
    }

    function storeCustomer()
    {
        $forminput = $this->input->post();

        $customer = $forminput['customerName'];
        $contact = $forminput['phoneNumber'];
        $i = 0;
        foreach ($customer as $key ) {
            $cont = $contact[$i];
            $this->db->insert('customers', ['customerName' => $key, 'phoneNumber' => $cont]);
            $i++;
        }

        $inserted = $this->db->affected_rows();

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Customer Added Successfully');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Failed Please Try Again');
        }
        redirect('customers/index');
    }

    function editCustomer($id)
    {
        //$this->data['product'] = $this->products_model->get($id);
        $this->data['pg_title'] = "Edit Customer";
        $this->data['page_content'] = 'customers/edit';
        $this->load->view('layout/template', $this->data);
    }

    function delete($id)
    {
        $customer = $this->customers_model->delete($id);
        $this->session->set_flashdata('success-msg', 'Customer deleted Successfully');
        redirect (base_url('customers/index'));
    }

}