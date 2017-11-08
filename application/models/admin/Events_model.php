<?php

class Events_model extends CI_Model {

    function create($event_data) {
        $this->db->insert('events', $event_data);
        return $this->db->insert_id();
    }

}
