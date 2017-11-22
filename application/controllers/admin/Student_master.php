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

    function upload_student_statement() {
        $main_path = FCPATH . "uploads";
        if (!is_dir($main_path)) {
            mkdir($main_path);
            chmod($main_path, 0777);
        }
        $sub_path = $main_path . DIRECTORY_SEPARATOR . 'db';
        if (!is_dir($sub_path)) {
            mkdir($sub_path);
            chmod($sub_path, 0777);
        }
        $path = $sub_path . DIRECTORY_SEPARATOR;
        $config['upload_path'] = './uploads/db/';
        $config['allowed_types'] = '*';

        $uploaded_statement = $this->_get_uploaded_statement_from_post();
        $validation_message = $this->_validate_new_upload($uploaded_statement);
        if ($validation_message != '') {
            echo json_encode(array('success' => FALSE, 'message' => $validation_message));
            return;
        }
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('student_data_file')) {
            echo json_encode(array('success' => FALSE, 'message' => $this->upload->display_errors()));
        } else {
            $upload_data = $this->upload->data();
            $data = array();
            $filename = base_url() . 'uploads' . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . $upload_data["file_name"];
            $this->session->set_userdata('file_name', $upload_data["file_name"]);
            $this->session->set_userdata('file_type', $uploaded_statement["file_type"]);

            $header_names = $this->_get_file_header($this->input->post("file_type"), $filename);
            if (count($header_names) < 7) {
                $this->_delete_file($upload_data["file_name"]);
                echo json_encode(array('success' => FALSE, 'message' => 'Less Headers'));
                return;
            }
            echo json_encode(array('success' => TRUE, 'message' => 'DB Statment Upload Sucessefully....', 'headers_data' => $header_names));
        }
    }

    function _get_uploaded_statement_from_post() {
        $uploaded_statement = array(
            'file_type' => $this->input->post('file_type'),
            'original_filename' => '',
        );
        return $uploaded_statement;
    }

    function _validate_new_upload($uploaded_statement) {
        if (!in_array($uploaded_statement['file_type'], array('xls', 'XLS'))) {
            return 'Invalid File Type Selected';
        }
        return '';
    }

    /*
     * This function renders the header array from a file (the first line of the file is considered to be its header)
     */

    function _get_file_header($file_type, $filename) {
        if ($file_type == "csv") {
            $data_arr = explode("\n", read_file($filename));
            $header_names = explode(',', $data_arr[0]);
        }
        if ($file_type == "xls") {
            $excel = new PhpExcelReader;
            $excel->read($filename);
            $header_data = $this->_sheet_data($excel->sheets[0], TRUE);
            $header_names = $header_data[0];
        }
        return $header_names;
    }

    /**
     * delete file  from folder
     */
    function _delete_file($file_name) {
        $upload_folder = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . $file_name;

        if (is_file($upload_folder)) {
            unlink($upload_folder);
        }
    }

    /**
     * This function return excelsheet data in csv
     * @param type $sheet
     * @param type $just_headers
     * @return array
     */
    function _sheet_data($sheet, $just_headers = FALSE) {
        $excel_data_array = array();
        $row_counter = $just_headers ? 1 : 2;
        while ($row_counter <= $sheet['numRows']) {
            $cell_string = "";
            $column_counter = 1;
            while ($column_counter <= $sheet['numCols']) {
                $cell = isset($sheet['cells'][$row_counter][$column_counter]) ? $sheet['cells'][$row_counter][$column_counter] : '';
                $cell = str_replace('~', '-', $cell);
                $cell_string .= $cell . "~";
                $column_counter++;
            }
            array_push($excel_data_array, explode('~', rtrim($cell_string, '~')));
            if ($just_headers) { // We just need the first row
                break;
            }
            $row_counter++;
        }
        return $excel_data_array;
    }

    /*
     * This function is called once the user has selected headers for a file and submitted, 
     * or from uploaded_statements.php when user clicks on an in progess file
     * This function checks if the uploaded statement for which it is called is in uploaded status or not, 
     * if so then it reades the file data and makes its entries in uploaded_statement_entries table
     * by function _create_uploaded_statement_entries and then updates the status of uploaded statement to in progess
     * and then proceeds the user to a screen where user can view all the uploades statement entries and manipulate them as required
     */

    function list_file_data() {
        $header_count = $this->input->post('header_count');
        $header_positions = $this->_get_position_array_from_post($header_count);
        $validation_message = $this->_validate_headers($header_positions, $header_count);
        if ($validation_message != '') {
            echo json_encode(array('success' => FALSE, 'message' => $validation_message));
            return;
        }
        $filename = base_url() . 'uploads' . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . get_from_session('file_name');
        $file_data_array = $this->_get_file_data(get_from_session('file_type'), $filename); // reading file data
        $this->db->trans_start();
        $error_entries = $this->_create_uploaded_statement_entries($file_data_array, $header_count, $header_positions);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => FALSE, 'message' => 'DB Error Occured'));
            return;
        }
        $this->_delete_file(get_from_session('file_name'));
        $this->session->unset_userdata('file_type');
        $this->session->unset_userdata('file_name');
        echo json_encode(array('success' => TRUE, 'message' => 'Import Sucessefully..', 'error_entries' => json_encode($error_entries)));
    }

    function _get_position_array_from_post($header_count) {
        $count = 0;
        $position_array = array();
        while ($count < $header_count) {
            if ($this->input->post("header_" . $count) != "ignore") {
                $position_array[$this->input->post("header_" . $count)] = $count;
            }
            $count++;
        }
        return $position_array;
    }

    function _validate_headers($header_positions, $header_count) {
        if ($header_count < 7) {
            return 'Less Headers';
        }
        if (count($header_positions) < 7) {
            // This indicates that either less headers are selected or repeated headers are there
            return 'Less or Repeated Field';
        }
        $flag_array = array(
            'course_flag' => FALSE,
            'semester_flag' => FALSE,
            'division_flag' => FALSE,
            'enrollment_no_flag' => FALSE,
            'roll_number_flag' => FALSE,
            'student_name_flag' => FALSE,
            'student_mobile_no_flag' => FALSE,
            'gender_flag' => FALSE
        );
        foreach ($header_positions as $key => $value) {
            if (!in_array($key, array('course', 'semester', 'division', 'enrollment_no', 'roll_number', 'student_name', 'student_mobile_no', 'gender'))) {
                return 'Invalid Headers';
            }
            $flag_array[$key . '_flag'] = TRUE;
        }

        if (!$flag_array['course_flag']) {
            return 'Plase Select Course';
        }
        if (!$flag_array['semester_flag']) {
            return 'Plase Select Semester';
        }
        if (!$flag_array['division_flag']) {
            return 'Plase Select Division';
        }
        if (!$flag_array['enrollment_no_flag']) {
            return 'Plase Select Enrollment Number';
        }
        if (!$flag_array['roll_number_flag']) {
            return 'Plase Select Roll Number';
        }
        if (!$flag_array['student_name_flag']) {
            return 'Plase Select Student Name';
        }
        if (!$flag_array['student_mobile_no_flag']) {
            return 'Plase Select Mobile Number';
        }
        if (!$flag_array['gender_flag']) {
            return 'Plase Select Gender';
        }
        return '';
    }

    /*
     * This function returns an array of data from a file whose name and type has been specified
     */

    function _get_file_data($file_type, $file_name) {
        $file_data_array = array();
        if ($file_type == "xls") {
            $excel = new PhpExcelReader;
            $excel->read($file_name);
            $file_data_array = $this->_sheet_data($excel->sheets[0]);
        }
        if ($file_type == "csv") {
            $file_data_string = read_file(base_url() . 'uploads/' . $file_name);
            $file_data_array = $this->_get_data_array_from_file_string($file_data_string);
        }
        return $file_data_array;
    }

    /*
     * This function accepts a data array read from a file, and header position, then parses each element of file data array.
     * It identifies which element of data array serves what information field from header positions array, and accordingly
     * prepares uploaded statements entries and inserts then in a batch. But while processing the file data array any erroreneous entry
     * or incorrect format data is encountered, it skips that entry and pushes it to an error array which is returned by this function
     */

    function _create_uploaded_statement_entries($file_data_array, $header_count, $header_positions) {
        $uploaded_statement_main_array = array();
        $count = 2;
        $error_entries = array();
        foreach ($file_data_array as $row_data) {
            if (trim(implode("", $row_data)) == "") { // skip blank row
                $count++;
                continue;
            }

            if (count($row_data) != $header_count) {
                array_push($error_entries, $count);
                $count++;
                continue;
            }
            $uploaded_statement_entry = array();
            $uploaded_statement_entry['created_by'] = get_from_session('user_id');
            $uploaded_statement_entry['created_time'] = date('Y-m-d H:i:s');
            $uploaded_statement_entry['course'] = trim($row_data[$header_positions["course"]]);
            $uploaded_statement_entry['enrollment_no'] = trim($row_data[$header_positions["enrollment_no"]]);
            $uploaded_statement_entry['roll_number'] = trim($row_data[$header_positions["roll_number"]]);
            $uploaded_statement_entry['student_name'] = strtoupper(trim($row_data[$header_positions["student_name"]]));
            $uploaded_statement_entry['student_mobile_no'] = trim($row_data[$header_positions["student_mobile_no"]]);
            $uploaded_statement_entry['division'] = $this->_get_division_data($row_data[$header_positions["division"]]);
            $uploaded_statement_entry['semester'] = $this->_get_semester($row_data[$header_positions["semester"]]);
            if (strtoupper($row_data[$header_positions["gender"]]) == 'FEMALE') {
                $uploaded_statement_entry['gender'] = FEMALE;
            } else {
                $uploaded_statement_entry['gender'] = MALE;
            }
            array_push($uploaded_statement_main_array, $uploaded_statement_entry);
            $count++;
        }
        if (!empty($uploaded_statement_main_array)) {
            $this->smm->create_uploaded_statement_entries_batch($uploaded_statement_main_array);
        }
        return $error_entries;
    }

    function _get_division_data($division) {
        if ($division == 'Div-I') {
            return ONE;
        } else if ($division == 'Div-II') {
            return TWO;
        } else if ($division == 'Div-III') {
            return THREE;
        } else if ($division == 'Div-IV') {
            return FOUR;
        } else if ($division == 'Div-V') {
            return FIVE;
        } else if ($division == 'Div-VI') {
            return SIX;
        } else if ($division == 'Div-VII') {
            return SEVEN;
        } else if ($division == 'Div-VIII') {
            return SEVEN;
        }
    }

    function _get_semester($semester) {
        if ($semester == 'Sem-I') {
            return ONE;
        } else if ($semester == 'Sem-II') {
            return TWO;
        } else if ($semester == 'Sem-III') {
            return THREE;
        } else if ($semester == 'Sem-IV') {
            return FOUR;
        } else if ($semester == 'Sem-V') {
            return FIVE;
        } else if ($semester == 'Sem-VI') {
            return SIX;
        }
    }

}
