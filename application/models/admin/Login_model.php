<?php

class Login_model extends CI_Model {

    /**
     * get all user data
     * @return type
     */
    function get_all_user_data() {
        $this->db->select('*');
        $this->db->where_not_in('user_type', SUPER_ADMIN);
        $this->db->from('user');
        $recs = $this->db->get();
        return $recs->result_array();
    }

    /**
     * 
     * @return type
     */
    function get_all_active_user_data() {
        $this->db->select('*');
        $this->db->where_not_in('user_type', SUPER_ADMIN);
        $this->db->where('is_active', IS_ACTIVE_YES);
        $this->db->from('user');
        $recs = $this->db->get();
        return $recs->result_array();
    }

    /**
     * get userdata by username
     * @param type $username
     * @return type
     */
    function get_by_username($username) {
        $this->db->where('username', $username);
        $this->db->where('is_active', IS_ACTIVE_YES);
        $recs = $this->db->get('user');
        return $recs->row_array();
    }

    /**
     * update password
     * @param type $user_id
     * @param type $new_password
     */
    function update_password($user_id, $new_password, $update_by, $update_time) {
        $this->db->where('user_id', $user_id);
        $this->db->set('password', $new_password);
        $this->db->set('updated_by', $update_by);
        $this->db->set('updated_time', $update_time);
        $this->db->update('user');
    }

    /**
     * signup_data insert
     * @param type $signup_data
     * @return type
     */
    function insert_signup_data($signup_data) {
        $this->db->insert('user', $signup_data);
        return $this->db->insert_id();
    }

    /**
     * get user information for the user id exits or not
     * @param type $signup_data
     * @return type
     */
    function check_for_existing_user($signup_data) {
        $this->db->where('username', $signup_data['username']);
        $this->db->from('user');
        $resc = $this->db->get();
        return $resc->row_array();
    }

    /**
     * update user status of user id active or not
     */
    function update_status($user_id, $user_status) {
        $this->db->where('user_id', $user_id);
        $this->db->set('is_active', $user_status);
        $this->db->update('user');
    }

    /**
     * get user data by user id
     * @param type $user_id
     * @return type
     */
    function get_by_user_id($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->from('user');
        $resc = $this->db->get();
        return $resc->row_array();
    }

}

/*
 * EOF: ./application/models/Login_model.php
 */