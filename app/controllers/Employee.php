<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends BASE_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('auth_model');
    }

    public function addstaff()
    {
        $this->data['pg_title'] = "Add Staff";
        $this->data['page_content'] = 'staff/add-staff';
        $this->load->view('layout/template', $this->data);
    }

    public function employees()
    {
        $this->data['employees'] = $this->employee_model->fetch_employees();
        $this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'staff/employees';
        $this->load->view('layout/template', $this->data);
    }

    public function mechanicIndex()
    {
        $this->data['mechanics'] = $this->employee_model->fetch_mechanics();
        $this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'staff/mechanics';
        $this->load->view('layout/template', $this->data);
    }

     /*
      Show a record page
    */
    public function Showstaff(int $id) 
    {
        $this->data['employee'] = $this->employee_model->fetch_byId($id);
        $this->data['id'] = $id;
        $this->data['pg_title'] = "Show Staff";
        $this->data['page_content'] = 'staff/show-staff';
        $this->load->view('layout/template', $this->data);
    }
     /*
      edit employee profile
    */
    function editprofile()
    {
        $this->data['employee'] = $this->employee_model->fetch_byId($id);
        $this->data['id'] = $id;
        $this->data['pg_title'] = "Update Profile";
        $this->data['page_content'] = 'admin/edit-profile';
        $this->load->view('layout/template', $this->data);
    }

    function setAdmin()
    {
        $this->data['admin'] = $this->employee_model->fetch_admin();
        $this->data['pg_title'] = "Dashboard";
        $this->data['page_content'] = 'staff/set-admin';
        $this->load->view('layout/template', $this->data);
    }

    /*
      Store a new record 
    */
    public function store()
    {
        $forminput = $this->input->post();

        $inserted = $this->employee_model->storeemployee($forminput);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Staff Added successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('employee/employees');
    }

    public function storeMechanic()
    {
        $config['max_size'] = 10000;
        $config['allowed_types'] = '*';
        $config['upload_path'] = FCPATH . 'res/mechanics';

        $this->load->library('upload', $config);

         if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            // var_dump($_FILES);die;

            $fileInfo = pathinfo($_FILES["file"]["name"]);
            $file =  time().".".$fileInfo['extension'];

            // echo $file;die;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            move_uploaded_file($_FILES["file"]["tmp_name"], FCPATH . "/res/mechanics/" . $file);
        }

        $forminput = $this->input->post();

        $data = array('firstname' => $forminput['firstname'], 'lastname' => $forminput['lastname'], 'phone_no' => $forminput['phone_no'], 'id_number' => $forminput['id_number'], 'specification' => json_encode($forminput['specification']), 'experience' => $forminput['experience'] , 'file' => $file);

        $inserted = $this->employee_model->store_mechanic($data);
        
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Mechanic Added successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('employee/mechanicIndex'); 
    }

    public function updateSetAdmin()
    {
        $forminput = $this->input->post();

        $data = array( 'api_key' => $forminput['api_key'], 'password' => $forminput['password'], 'recipients' => $forminput['recipients']);

        $inserted = $this->employee_model->update_setAdmin($data);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Admins Added successfully');
        } else {
            $this->session->set_flashdata('success-msg', 'Admins Updated successfully');
            // $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('employee/setAdmin'); 
    }
    /*
      Edit a record page
    */
    public function editstaff(int $id) 
    {
        $this->data['employee'] = $this->employee_model->fetch_byId($id);
        $this->data['id'] = $id;
        $this->data['pg_title'] = "Edit Staff";
        $this->data['page_content'] = 'staff/edit-staff';
        $this->load->view('layout/template', $this->data);
    }

    public function editMechanic(int $id) 
    {
        $this->data['mechanic'] = $this->employee_model->fetch_MechanicbyId($id);
        $this->data['id'] = $id;
        $this->data['pg_title'] = "Edit Staff";
        $this->data['page_content'] = 'staff/edit-mechanic';
        $this->load->view('layout/template', $this->data);
    }

    public function showMechanic(int $id) 
    {
        $this->data['mechanic'] = $this->employee_model->fetch_MechanicbyId($id);
        $this->data['id'] = $id;
        $this->data['pg_title'] = "Edit Staff";
        $this->data['page_content'] = 'staff/show-mechanic';
        $this->load->view('layout/template', $this->data);
    }
    /*
      update a record page
    */
    public function update(int $id)
    {
        $forminput = $this->input->post();

        $inserted = $this->employee_model->edit_employee($id, $forminput);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Staff updated successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('employee/employees');
    }
    /*
      update employee Profile
    */
    public function updateprofile(int $id)
    {
        $forminput = $this->input->post();

        $inserted = $this->employee_model->edit_employee($id, $forminput);
        if ($inserted > 0) {
            $userdata = $this->employee_model->fetchprofile_byId($id);
            // var_dump($userdata);die;
            $this->session->unset_userdata('user_aob');
            $this->session->set_userdata('user_aob',$userdata);
            $this->session->set_flashdata('success-msg', 'Profile updated successfully');
             
        } else {
            $this->session->set_flashdata('error-msg', 'Err!, please try again');
        }
        redirect('main/myprofile');
    }

    public function updateMechanic(int $id)
    {
        $forminput = $this->input->post();

        $inserted = $this->employee_model->edit_mechanic($id, $forminput);

        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Mechanic Updated Successfilly');
        }else{
            $this->session->set_flashdata('error-msg', 'Err! Try Again');
        }

        redirect('employee/mechanicIndex');
    }
    /*
      Delete a record
    */
    public function deletestaff(int $id)
    {
        $inserted = $this->employee_model->deleteemployee($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Employee deleted successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('employee/employees');
    }

    public function deleteMechanic($id)
    {
        $inserted = $this->employee_model->delete_mechanic($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg', 'Mechanic deleted successfully');
        } else {
            $this->session->set_flashdata('error-msg', 'Failed, please try again');
        }
        redirect('employee/mechanicIndex');
    }
}