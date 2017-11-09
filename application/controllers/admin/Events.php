<?php

class Events extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_admin_authenticated();
        $this->load->model('admin/events_model');
    }

    /**
     * get all events data for table view
     */
    function get_events_data() {
        $events_data = $this->events_model->get_all_event_data();
        echo json_encode($events_data);
    }

    /**
     * this function is use for event add into data base
     * @return type
     */
    function create_events() {
        $event_data = $this->_get_event_data_from_post();
        $validation_massage = $this->_check_event_validation($event_data);
        if ($validation_massage) {
            echo json_encode(array('success' => FALSE, 'message' => $validation_massage));
            return;
        }
        $event_data['created_by'] = get_from_session('user_id');
        $event_data['created_time'] = date('Y-m-d H:i:s');
        if ($this->_check_event_exists($event_data)) {
            echo json_encode(array('success' => false, 'message' => 'Event Exists'));
            return;
        }
        $this->db->trans_start();
        $event_id = $this->events_model->create($event_data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => false, 'message' => 'Db Error Occured'));
            return;
        }
        echo json_encode(array('success' => true, 'message' => 'Event Add Successflly!'));
    }

    function _get_event_data_from_post() {
        $event_data = array(
            "event_name" => $this->input->post('event_name'),
            "category_id" => $this->input->post('category_id'),
            "sub_category_id" => $this->input->post('sub_category_id'),
            "event_organized_for" => $this->input->post('organized_for'),
            "event_type" => $this->input->post('event_type'),
            "event_place" => $this->input->post('event_place'),
            "event_start_date" => to_database_format($this->input->post('event_start_date')),
            "event_end_date" => to_database_format($this->input->post('event_end_date')),
            "event_start_time" => $this->input->post('event_start_time'),
            "event_end_time" => $this->input->post('event_end_time'),
            "event_description" => $this->input->post('event_description'),
            "registration_start_date" => to_database_format($this->input->post('registration_start_date')),
            "registration_end_date" => to_database_format($this->input->post('registration_end_date'))
        );
        return $event_data;
    }

    /**
     * check valition of form
     */
    function _check_event_validation($event_data) {
        if ($event_data['event_name'] == '') {
            return 'Please Enter Event Name';
        }
        if ($event_data['category_id'] == '') {
            return 'Please Select Category';
        }
        if ($event_data['sub_category_id'] == '') {
            return 'Please Select Sub-Category';
        }
        if ($event_data['event_organized_for'] == '') {
            return 'Please Select Organized-For';
        }
        if ($event_data['event_type'] == '') {
            return 'Please Select Event Type';
        }
        if ($event_data['event_place'] == '') {
            return 'Please Enter Event Place';
        }
        if ($event_data['event_start_date'] == '0000-00-00') {
            return 'Please Enter Event Start Date';
        }
        if ($event_data['event_end_date'] == '0000-00-00') {
            return 'Please Enter Event End Date';
        }
        if ($event_data['event_start_time'] == '') {
            return 'Please Enter Event Start Time';
        }
        if ($event_data['event_end_time'] == '') {
            return 'Please Enter Event End Time';
        }
        if ($event_data['registration_start_date'] == '0000-00-00') {
            return 'Please Enter Registration Start Date';
        }
        if ($event_data['registration_end_date'] == '0000-00-00') {
            return 'Please Enter Registration End Date';
        }
        if ($event_data['event_description'] == '') {
            return 'Please Enter Event Description';
        }
        return '';
    }

    /**
     * check for Event exist or not by event_data
     * @return type
     */
    function _check_event_exists($event_data) {
        $event_data['event_id'] = $this->input->post('event_id');
        $event_info = $this->events_model->get_event_info($event_data);
        if (!empty($event_info)) {
            return true;
        }
        return false;
    }

    /**
     * delete event by id
     */
    function delete_event() {
        $event_id = get_from_post('event_id');
        $this->db->trans_start();
        $this->events_model->delete($event_id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(array('success' => false, 'message' => 'Db Error Occured'));
            return;
        }
        echo json_encode(array('success' => true, 'message' => 'Event Deleted Successflly!'));
    }

}
