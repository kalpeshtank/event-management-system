<?php

class Student_master_model extends CI_Model {

    /**
     * get all student data for listing
     * @return type
     */
    function get_all_student_data() {
        $this->db->select('*');
        $this->db->from('student_master');
        return $this->db->get()->result_array();
    }

    /**
     * insert new data intu category table
     * @param type $student_data
     * @return type
     */
    function create($student_data) {
        $this->db->insert('student_master', $student_data);
        return $this->db->insert_id();
    }

    /*
     * delete student Data by student_id
     */

    function delete($student_id) {
        $this->db->where('student_id', $student_id);
        $this->db->delete('student_master');
    }

    /**
     * this function update the student data
     * @param type $student_id
     * @param type $student_data
     */
//    function update($student_id, $student_data) {
//        $student_data['updated_time'] = date('Y-m-d H:i:s');
//        $student_data['updated_by'] = get_from_session('user_id');
//        $this->db->where('student_id', $student_id);
//        $this->db->update('student_master', $student_data);
//    }

    /*
     * get student data for edit by student id
     */

//    function get_student_by_id($student_id) {
//        $this->db->select('*');
//        $this->db->where('student_id', $student_id);
//        $this->db->from('student_master');
//        return $this->db->get()->row_array();
//    }

    /**
     *  get student info by student data
     * @param type $student_data
     * @return type
     */
    function get_student_info($student_data) {
        $this->db->where('semester', $student_data['semester']);
        $this->db->where('division', $student_data['division']);
        $this->db->where('enrollment_no', $student_data['enrollment_no']);
        $this->db->where('roll_number', $student_data['roll_number']);
        if ($student_data['student_id'] != '') {
            $this->db->where('student_id !=' . $student_data['student_id']);
        }
        $recs = $this->db->get('student_master');
        return $recs->result_array();
    }

}
