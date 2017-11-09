<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/sub_category_model');
        check_admin_authenticated();
    }

    /**
     * get all sub Category data
     */
    function get_sub_category() {
        $sub_category_data = $this->sub_category_model->get_all_sub_category_data();
        echo json_encode($sub_category_data);
    }

    /*
     * create new sub category item in this function
     */

    function create_sub_category() {
        $sub_category_data = $this->_get_sub_category_data_from_post();
        $validation_massage = $this->_check_sub_category_validation($sub_category_data);
        if ($validation_massage) {
            echo json_encode(array('success' => FALSE, 'message' => $validation_massage));
            return;
        }
        $sub_category_data['created_by'] = get_from_session('user_id');
        $sub_category_data['created_time'] = date('Y-m-d H:i:s');
        if ($this->_check_sub_category_exists($sub_category_data)) {
            echo json_encode(array('success' => false, 'message' => 'Sub Category Exists'));
            return;
        }
        $this->db->trans_start();
        $sub_category_data['sub_category_id'] = $this->sub_category_model->create($sub_category_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => false, 'message' => 'Db Error Occured'));
            return;
        }
        echo json_encode(array('success' => true, 'message' => 'Sub Category Add Successflly!', 'sub_category_data' => $sub_category_data));
    }

    /**
     * update sub category record by sub_category id 
     */
    function update_sub_category() {
        $sub_category_data = $this->_get_sub_category_data_from_post();
        $validation_massage = $this->_check_sub_category_validation($sub_category_data);
        if ($validation_massage) {
            echo json_encode(array('success' => FALSE, 'message' => $validation_massage));
            return;
        }
        $sub_category_id = get_from_post('sub_category_id');
        if ($this->_check_sub_category_exists($sub_category_data)) {
            echo json_encode(array('success' => false, 'message' => 'Sub Category Exists'));
            return;
        }
        $this->db->trans_start();
        $this->sub_category_model->update($sub_category_id, $sub_category_data);
        $sub_category_data['sub_category_id'] = $sub_category_id;
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => FALSE, 'message' => 'Some unexpected database error encountered due to which your transaction could not be completed'));
            return;
        }
        echo json_encode(array('success' => TRUE, 'message' => 'Sub Category Update Successflly!', 'sub_category_data' => $sub_category_data));
    }

    function _get_sub_category_data_from_post() {
        $sub_category_data = array(
            "sub_category_name" => get_from_post('sub_category_name'),
            "sub_category_description" => get_from_post('sub_category_description')
        );
        return $sub_category_data;
    }

    /**
     * check valition of form
     */
    function _check_sub_category_validation($sub_category) {
        if ($sub_category['sub_category_name'] == '') {
            return 'Please Enter Sub Category Name';
        }
        if ($sub_category['sub_category_description'] == '') {
            return 'Please Enter Sub Category Description';
        }
        return '';
    }

    /**
     * delete sub category by id
     */
    function delete_sub_category() {
        $sub_category_id = get_from_post('sub_category_id');
        $this->db->trans_start();
        $this->sub_category_model->delete($sub_category_id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => false, 'message' => 'Db Error Occured'));
            return;
        }
        echo json_encode(array('success' => true, 'message' => 'Sub Category Deleted Successflly!'));
    }

    /**
     * get sub categoru record for edit by sub cetegorry id
     */
    function get_sub_category_by_id() {
        $sub_category_id = get_from_post('sub_category_id');
        $sub_category_data = $this->sub_category_model->get_sub_category_by_id($sub_category_id);
        echo json_encode(array('sub_category_data' => $sub_category_data));
    }

    /**
     * check for sub category exist or not by sub_category_data
     * @return type
     */
    function _check_sub_category_exists($sub_category_data) {
        $sub_category_data['sub_category_id'] = $this->input->post('sub_category_id');
        $sub_category_info = $this->sub_category_model->get_categoryy_info($sub_category_data);
        if (!empty($sub_category_info)) {
            return true;
        }
        return false;
    }

}

/*
 * EOF: ./application/controllers/admin/Sub_category.php
 */

