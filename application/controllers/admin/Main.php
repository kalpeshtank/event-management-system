<?php

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
//        $entity_id = get_from_session('entity_id');
//        $book_id = get_from_session('book_id');
//        $user_id = get_from_session('user_id');
//        $data = $this->data_lib->get_all_variables($entity_id, $book_id, $user_id);

        $this->load->view('admin/common/header');
        $this->load->view('admin/main/main');
        $this->load->view('admin/common/footer');
        $this->load->view('admin/common/backbone_footer');
    }

}
