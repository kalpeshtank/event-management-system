<?php

class Events extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function create_events() {
        $event_data = $this->_get_event_data_from_post();
        print_r($_POST);
        exit;
    }

    function _get_event_data_from_post() {
        $event_data = array(
        );
        return $event_data;
    }

}
