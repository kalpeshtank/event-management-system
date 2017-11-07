<?php

class Sub_category_model extends CI_Model {

    /**
     * get all sub category data for listing
     * @return type
     */
    function get_all_sub_category_data() {
        $this->db->select('*');
        $this->db->from('sub_category');
        return $this->db->get()->result_array();
    }

    /**
     * insert new data into sub category table
     * @param type $sub_category_data
     * @return type
     */
    function create($sub_category_data) {
        $this->db->insert('sub_category', $sub_category_data);
        return $this->db->insert_id();
    }

    /*
     * delete sub catogory by catgory id
     */

    function delete($category_id) {
        $this->db->where('sub_category_id', $category_id);
        $this->db->delete('sub_category');
    }

    /**
     * update sub category
     * @param type $sub_category_id
     * @param type $sub_category_data
     */
    function update($sub_category_id, $sub_category_data) {
        $sub_category_data['updated_time'] = date('Y-m-d H:i:s');
        $sub_category_data['updated_by'] = get_from_session('user_id');
        $this->db->where('sub_category_id', $sub_category_id);
        $this->db->update('sub_category', $sub_category_data);
    }

    /*
     * get sub category data for edit by sub_category id
     */

    function get_sub_category_by_id($sub_category_id) {
        $this->db->select('*');
        $this->db->where('sub_category_id', $sub_category_id);
        $this->db->from('sub_category');
        return $this->db->get()->row_array();
    }

    /**
     * get category info by category data
     * @param type $sub_category
     * @param type $
     * @return type
     */
    function get_categoryy_info($sub_category) {
        $this->db->where('sub_category_name', $sub_category['sub_category_name']);
        if ($sub_category['sub_category_id'] != '') {
            $this->db->where('sub_category_id !=' . $sub_category['sub_category_id']);
        }
        $recs = $this->db->get('sub_category');
        return $recs->result_array();
    }

}
