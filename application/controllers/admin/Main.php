<?php

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        check_admin_authenticated();
    }

    function index() {
        $this->load->view('admin/common/header');
        $this->load->view('admin/main/main');
        $this->load->view('admin/common/footer');
        $this->load->view('admin/common/backbone_footer');
    }

}

/*
 * EOF: ./application/controllers/admin/Main.php
 */
