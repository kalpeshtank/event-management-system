<?php

class Category_model extends CI_Model {

    /**
     * get all category data for listing
     * @param type $username
     * @return type
     */
    function get_all_category_data() {
        $this->db->select('*');
        $this->db->from('category');
        return $this->db->get()->result_array();
    }

}
