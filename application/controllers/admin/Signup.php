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
        $subscription_data = $this->_get_subscription_data($user_id);
        $subscription_id = $this->login_model->insert_subscription_data($subscription_data);
        $subscription_account_data = $this->_get_subscription_account_data($subscription_id, $user_id);
        $subscriber_account_id = $this->login_model->insert_subscription_account_data($subscription_account_data);
        $subscription_account_user_data = $this->_get_subscription_account_user_data($subscriber_account_id, $user_id);
        $this->login_model->insert_subscription_account_user_data($subscription_account_user_data);
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

    function _get_subscription_data($user_id) {
        $subscription_start_date = date('Y-m-d');
        $subscription_valid_upto_date_obj = new DateTime(date('Y-m-d'));
        $subscription_valid_upto_date_obj->modify('+1 Month');
        return array(
            'subscription_name' => 'subscription1',
            'number_of_users' => 1,
            'number_of_entity' => 1,
            'subscription_start_date' => $subscription_start_date,
            'subscription_valid_upto' => $subscription_valid_upto_date_obj->format('Y-m-d'),
            'created_by' => $user_id,
            'created_time' => date('Y-m-d H:i:s'),
        );
    }

    function _get_subscription_account_data($subscription_id, $user_id) {
        $final_company_name = '';
        $company_name = $this->input->post('company_name');
        if ($company_name == '') {
            $final_company_name = $this->input->post('user_name');
        } else {
            $final_company_name = $this->input->post('company_name');
        }
        return array(
            'subscription_id' => $subscription_id,
            'contact_person_name' => $this->input->post('user_name'),
            'subscriber_account_name' => $final_company_name,
            'address' => '',
            'phone_number' => $this->input->post('mobile_number'),
            'email' => $this->input->post('user_email'),
            'database_id' => 1,
            'created_by' => $user_id,
            'created_time' => date('Y-m-d H:i:s')
        );
    }

    function _get_subscription_account_user_data($subscriber_account_id, $user_id) {
        return array(
            'user_id' => $user_id,
            'subscriber_account_id' => $subscriber_account_id,
            'permission' => '',
            'relationship_type' => OWNER
        );
    }

}
