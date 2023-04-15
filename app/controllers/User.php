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
class User extends BASE_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('auth_model');
    }

    /*
     * Default method for this controller - Login
     */
    function index()
    {
        $this->load->view('auth/login');
        if ($this->session->userdata('user_aob')) {
            redirect('dashboard');
        }
    }

    //finish the session of a logged in user
    function logout()
    {
        // echo "here";die;
        $this->session->unset_userdata('user_aob');
        $this->session->sess_destroy();
        redirect('user/index');
    }

    function login()
    {
        if ($this->session->userdata('user_aob')) {
            redirect('dashboard');
        }
        $formInput = $this->input->post();
        $email = $formInput['email'];
        $password = $formInput['password'];

        // define data to send
        $logindata = ['email' => $email, 'password' => $password];

        $loginresponse = json_decode($this->auth_model->login($logindata));
        // var_dump($loginresponse);die;
        // echo $loginresponse->message;die;
        if ($loginresponse->status == '1') {
            $this->session->set_userdata('user_aob', $loginresponse->userdata);
            redirect('dashboard');
        } else {

            $this->session->set_flashdata('error-msg', $loginresponse->message);
            redirect('user/index');
        }

    }


}