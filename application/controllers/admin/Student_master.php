<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student_master extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/student_master_model', 'smm');
    }

//    /**
//     * get all student data
//     */
    function get_student() {
        $student_data = $this->smm->get_all_student_data();
        echo json_encode($student_data);
    }

    function create_student() {
        $student_data = $this->_get_student_data_from_post();
        $validation_massage = $this->_check_student_validation($student_data);
        if ($validation_massage) {
            echo json_encode(array('success' => FALSE, 'message' => $validation_massage));
            return;
        }
        $student_data['created_by'] = get_from_session('user_id');
        $student_data['created_time'] = date('Y-m-d H:i:s');
        if ($this->_check_student_exists($student_data)) {
            echo json_encode(array('success' => false, 'message' => 'Student Exists'));
            return;
        }
        $this->db->trans_start();
        $student_data['student_id'] = $this->smm->create($student_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => false, 'message' => 'Db Error Occured'));
            return;
        }
        echo json_encode(array('success' => true, 'message' => 'Student Add Successflly!', 'category_data' => $student_data));
    }

//    /**
//     * update category record by category id 
//     */
//    function update_category() {
//        $category_data = $this->_get_student_data_from_post();
//        $student_id = get_from_post('student_id');
//        $validation_massage = $this->_check_student_validation($category_data);
//        if ($validation_massage) {
//            echo json_encode(array('success' => FALSE, 'message' => $validation_massage));
//            return;
//        }
//        if ($this->_check_student_exists($category_data)) {
//            echo json_encode(array('success' => false, 'message' => 'Category Exists'));
//            return;
//        }
//        $this->db->trans_start();
//        $this->smm->update($student_id, $category_data);
//        $category_data['category_id'] = $student_id;
//        $this->db->trans_complete();
//        if ($this->db->trans_status() === FALSE) {
//            echo json_encode(array('success' => FALSE, 'message' => 'Some unexpected database error encountered due to which your transaction could not be completed'));
//            return;
//        }
//        echo json_encode(array('success' => TRUE, 'message' => 'Category Update Successflly!', 'category_data' => $category_data));
//    }
    /**
     * get form data from post
     * @return type
     */
    function _get_student_data_from_post() {
        $student_data = array(
            "course" => get_from_post('course'),
            "semester" => get_from_post('semester'),
            "division" => get_from_post('division'),
            "enrollment_no" => get_from_post('enrollment_no'),
            "roll_number" => get_from_post('roll_number'),
            "student_name" => strtoupper(get_from_post('student_name')),
            "student_mobile_no" => get_from_post('student_mobile_no'),
            "gender" => get_from_post('gender')
        );
        return $student_data;
    }

    /**
     * check valition of form
     */
    function _check_student_validation($student_data) {
        if ($student_data['course'] == '') {
            return 'Please Select Any Course';
        }
        if ($student_data['semester'] == '') {
            return 'Please Select Any Semester';
        }
        if ($student_data['division'] == '') {
            return 'Please Select Any Division';
        }
        if ($student_data['enrollment_no'] == '') {
            return 'Please Enter Enrollment Number';
        }
        if ($student_data['roll_number'] == '') {
            return 'Please Enter Roll Number';
        }
        if ($student_data['student_name'] == '') {
            return 'Please Enter Student Name';
        }
        if ($student_data['student_mobile_no'] == '') {
            return 'Please Enter Student Mobile Number';
        }
        if ($student_data['gender'] == '') {
            return 'Please Select Any Gender';
        }
        return '';
    }

    /**
     * delete student by id
     */
    function delete_student() {
        $student_id = get_from_post('student_id');
        $this->db->trans_start();
        $this->smm->delete($student_id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => false, 'message' => 'Db Error Occured'));
            return;
        }
        echo json_encode(array('success' => true, 'message' => 'Student Deleted Successflly!'));
    }

    /**
     * get categoru record for edit bu cetegorry id
     */
//    function get_category_by_id() {
//        $category_id = get_from_post('category_id');
//        $category_data = $this->smm->get_category_by_id($category_id);
//        echo json_encode(array('category_data' => $category_data));
//    }

    /**
     * check for student exist or not by student_data
     * @return type
     */
    function _check_student_exists($student_data) {
        $student_data['student_id'] = $this->input->post('student_id');
        $student_info = $this->smm->get_student_info($student_data);
        if (!empty($student_info)) {
            return true;
        }
        return false;
    }

}
