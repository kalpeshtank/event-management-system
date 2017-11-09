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

    /**
     * insert new data intu category table
     * @param type $category_data
     * @return type
     */
    function create($category_data) {
        $this->db->insert('category', $category_data);
        return $this->db->insert_id();
    }

    /*
     * delete catogory by catgory id
     */

    function delete($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->delete('category');
    }

    /**
     * this function update the category data
     * @param type $category_id
     * @param type $category_data
     */
    function update($category_id, $category_data) {
        $category_data['updated_time'] = date('Y-m-d H:i:s');
        $category_data['updated_by'] = get_from_session('user_id');
        $this->db->where('category_id', $category_id);
        $this->db->update('category', $category_data);
    }

    /*
     * get category data for edit by category id
     */

    function get_category_by_id($category_id) {
        $this->db->select('*');
        $this->db->where('category_id', $category_id);
        $this->db->from('category');
        return $this->db->get()->row_array();
    }

    /**
     * get category info by category data
     * @param type $category
     * @param type $
     * @return type
     */
    function get_categoryy_info($category) {
        $this->db->where('category_name', $category['category_name']);
        if ($category['category_id'] != '') {
            $this->db->where('category_id !=' . $category['category_id']);
        }
        $recs = $this->db->get('category');
        return $recs->result_array();
    }

}
