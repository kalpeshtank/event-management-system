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

    /**
     * get all user data for listing without super admin 
     */
    function get_all_user() {
        $user_id = get_from_session('user_id');
        $user_data = $this->login_model->get_all_user_data($user_id);
        echo json_encode($user_data);
    }

    /**
     * insert and creat new user type is admin 
     * @return type
     */
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
        $signup_data['user_id'] = $this->login_model->insert_signup_data($signup_data);
        echo json_encode(array('success' => true, "user_data" => $signup_data));
    }

    function _get_user_data() {
        $is_active;
        if (is_super_admin()) {
            $is_active = IS_ACTIVE_YES;
        } else {
            $is_active = IS_ACTIVE_NO;
        }
        return array(
            'username' => $this->input->post('user_email'),
            'password' => md5($this->input->post('user_password')),
            'name' => $this->input->post('user_name'),
            'user_type' => ADMIN,
            'is_active' => $is_active,
            'created_by' => 0,
            'created_time' => date('Y-m-d H:i:s')
        );
    }

    /**
     * update the user status
     */
    function active_diactive_user() {
        $user_id = $this->input->post('user_id');
        $user_status = $this->input->post('user_status');
        $this->login_model->update_status($user_id, $user_status);
        $user_data = $this->login_model->get_by_user_id($user_id);
        echo json_encode(array('success' => true, "user_data" => $user_data));
    }

}

/*
 * EOF: ./application/controllers/admin/Signup.php
 */
