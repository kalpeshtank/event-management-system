<?php

class Events_model extends CI_Model {

    /**
     * get all events data for listing
     * @param type $username
     * @return type
     */
    function get_all_event_data() {
        $this->db->select('*');
        $this->db->from('events');
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
     * get event info by event data
     * @param type $event_data
     * @param type $
     * @return type
     */
    function get_event_info($event_data) {
        $this->db->where('event_name', $event_data['event_name']);
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

}
