<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/sub_category_model');
        $this->load->model('admin/category_model');
        $this->load->model('admin/login_model');
    }

    public function index() {
        if (USER_COMING_SOON) {
            $this->load->view('coming_soon');
        } else {
            $data['category'] = generate_array_for_id_object($this->category_model->get_all_category_data(), 'category_id');
            $data['sub_category'] = generate_array_for_id_object($this->sub_category_model->get_all_sub_category_data(), 'sub_category_id');
            $data['user_data'] = generate_array_for_id_object($this->login_model->get_all_active_user_data(), 'user_id');
            $this->load->view('user/common/header', $data);
            $this->load->view('user/main/main');
            $this->load->view('user/common/footer');
            $this->load->view('user/common/backbone_footer');
        }
    }

}
