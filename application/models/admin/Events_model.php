<?php

class Events_model extends CI_Model {

    /**
     * get all events data for listing
     * @param type $username
     * @return type
     */
    function get_all_event_data($is_admin) {
        $this->db->select('*');
        $this->db->from('events');
        if ($is_admin) {
            $user_id = get_from_session('user_id');
            $this->db->where('handle_by', $user_id);
        }
        return $this->db->get()->result_array();
    }

    /**
     * insert event data
     * @param type $event_data
     * @return type
     */
    function create($event_data) {
        $this->db->insert('events', $event_data);
        return $this->db->insert_id();
    }

    /**
     * this function update the Events data
     * @param type $event_id
     * @param type $events_data
     */
    function update($event_id, $events_data) {
        $events_data['updated_time'] = date('Y-m-d H:i:s');
        $events_data['updated_by'] = get_from_session('user_id');
        $this->db->where('event_id', $event_id);
        $this->db->update('events', $events_data);
    }

    /**
     * get event info by event data
     * @param type $event_data
     * @param type $
     * @return type
     */
    function get_event_info($event_data) {
        $this->db->where('event_name', $event_data['event_name']);
        $this->db->where('handle_by', $event_data['handle_by']);
        $this->db->where('category_id', $event_data['category_id']);
        $this->db->where('sub_category_id', $event_data['sub_category_id']);
        $this->db->where('event_organized_for', $event_data['event_organized_for']);
        $this->db->where('event_type', $event_data['event_type']);
        $this->db->where('event_place', $event_data['event_place']);
        $this->db->where('event_start_date', $event_data['event_start_date']);
        $this->db->where('event_end_date', $event_data['event_end_date']);
        $this->db->where('event_start_time', $event_data['event_start_time']);
        $this->db->where('event_end_time', $event_data['event_end_time']);
        $this->db->where('registration_start_date', $event_data['registration_start_date']);
        $this->db->where('registration_end_date', $event_data['registration_end_date']);
        if ($event_data['event_id'] != '') {
            $this->db->where('event_id !=' . $event_data['event_id']);
        }
        $recs = $this->db->get('events');
        return $recs->result_array();
    }

    /*
     * delete event by event id
     */

    function delete($event_id) {
        $this->db->where('event_id', $event_id);
        $this->db->delete('events');
    }

    /**
     *  
     * get events data for edit by events id
     * @param type $event_id
     * @return type
     */
    function get_event_by_id($event_id) {
        $this->db->select('*');
        $this->db->where('event_id', $event_id);
        $this->db->from('events');
        return $this->db->get()->row_array();
    }

}
