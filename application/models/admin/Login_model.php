<?php

class Login_model extends CI_Model {

    /**
     * get userdata by username
     * @param type $username
     * @return type
     */
    function get_by_username($username) {
        $this->db->where('username', $username);
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

    function insert_signup_data($signup_data) {
        $this->db->insert('user', $signup_data);
        return $this->db->insert_id();
    }

    function insert_subscription_data($subscription_data) {
        $this->db->insert('subscription', $subscription_data);
        return $this->db->insert_id();
    }

    function insert_subscription_account_data($subscription_account_data) {
        $this->db->insert('subscriber_account', $subscription_account_data);
        return $this->db->insert_id();
    }

    function insert_subscription_account_user_data($subscription_account_user_data) {
        $this->db->insert('subscriber_account_users', $subscription_account_user_data);
        return $this->db->insert_id();
    }

    function check_for_existing_user($signup_data) {
        $this->master_db->where('username', $signup_data['username']);
        $this->master_db->from('user');
        $resc = $this->master_db->get();
        return $resc->row_array();
    }

}

/*
 * EOF: ./application/models/Login_model.php
 */