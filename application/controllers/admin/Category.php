<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        check_admin_authenticated();
        $this->load->model('admin/category_model');
    }

    /**
     * get all Category data
     */
    function get_category() {
        $category_data = $this->category_model->get_all_category_data();
        echo json_encode($category_data);
    }

    /*
     * create new category item in this function
     */

    function create_category() {
        $category_data = $this->_get_category_data_from_post();
        $validation_massage = $this->_check_category_validation($category_data);
        if ($validation_massage) {
            echo json_encode(array('success' => FALSE, 'message' => $validation_massage));
            return;
        }
        $category_data['created_by'] = get_from_session('user_id');
        $category_data['created_time'] = date('Y-m-d H:i:s');
        if ($this->_check_category_exists($category_data)) {
            echo json_encode(array('success' => false, 'message' => 'Category Exists'));
            return;
        }
        $this->db->trans_start();
        $category_data['category_id'] = $this->category_model->create($category_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => false, 'message' => 'Db Error Occured'));
            return;
        }
        echo json_encode(array('success' => true, 'message' => 'Category Add Successflly!', 'category_data' => $category_data));
    }

    /**
     * update category record by category id 
     */
    function update_category() {
        $category_data = $this->_get_category_data_from_post();
        $category_id = get_from_post('category_id');
        $validation_massage = $this->_check_category_validation($category_data);
        if ($validation_massage) {
            echo json_encode(array('success' => FALSE, 'message' => $validation_massage));
            return;
        }
        if ($this->_check_category_exists($category_data)) {
            echo json_encode(array('success' => false, 'message' => 'Category Exists'));
            return;
        }
        $this->db->trans_start();
        $this->category_model->update($category_id, $category_data);
        $category_data['category_id'] = $category_id;
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => FALSE, 'message' => 'Some unexpected database error encountered due to which your transaction could not be completed'));
            return;
        }
        echo json_encode(array('success' => TRUE, 'message' => 'Category Update Successflly!', 'category_data' => $category_data));
    }

    function _get_category_data_from_post() {
        $category_data = array(
            "category_name" => get_from_post('category_name'),
            "category_description" => get_from_post('category_description')
        );
        return $category_data;
    }

    /**
     * check valition of form
     */
    function _check_category_validation($category) {
        if ($category['category_name'] == '') {
            return 'Please Enter Category Name';
        }
        if ($category['category_description'] == '') {
            return 'Please Enter Category Description';
        }
        return '';
    }

    /**
     * delete category by id
     */
    function delete_category() {
        $category_id = get_from_post('category_id');
        $this->db->trans_start();
        $this->category_model->delete($category_id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => false, 'message' => 'Db Error Occured'));
            return;
        }
        echo json_encode(array('success' => true, 'message' => 'Category Deleted Successflly!'));
    }

    /**
     * get categoru record for edit bu cetegorry id
     */
    function get_category_by_id() {
        $category_id = get_from_post('category_id');
        $category_data = $this->category_model->get_category_by_id($category_id);
        echo json_encode(array('category_data' => $category_data));
    }

    /**
     * check for category exist or not by category_data
     * @return type
     */
    function _check_category_exists($category_data) {
        $category_data['category_id'] = $this->input->post('category_id');
        $category_info = $this->category_model->get_categoryy_info($category_data);
        if (!empty($category_info)) {
            return true;
        }
        return false;
    }

}

/*
 * EOF: ./application/controllers/admin/Category.php
 */

