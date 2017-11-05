<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/category_model');
        check_admin_authenticated();
    }

    /**
     * get all Category dara
     */
    function get_category() {
        $category_data = $this->category_model->get_all_category_data();
        echo json_encode($category_data);
    }

    function create_category() {
        
    }

    function update_category() {
        
    }

}

/*
 * EOF: ./application/controllers/admin/Category.php
 */

