<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/login_model');
    }

    function index() {
        $this->load->view('admin/signup');
    }

    function create() {
        $signup_data = $this->_get_user_data();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            echo json_encode(array('success' => false, 'message' => 'Invalid Email'));
            return;
        }
        $exist_user = $this->login_model->check_for_existing_user($signup_data);
        if (!empty($exist_user)) {
            echo json_encode(array('success' => false, 'message' => 'User Already Exists'));
            return;
        }
        $user_id = $this->login_model->insert_signup_data($signup_data);
        echo json_encode(array('success' => true));
    }

    function _get_user_data() {
        return array(
            'username' => $this->input->post('user_email'),
            'password' => md5($this->input->post('user_password')),
            'name' => $this->input->post('user_name'),
            'created_by' => 0,
            'created_time' => date('Y-m-d H:i:s')
        );
    }

}

/*
 * EOF: ./application/controllers/admin/Signup.php
 */
