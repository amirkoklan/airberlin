<?php

class Add extends CI_Controller {
    public function index()
        {
        $data = array();
            $this->load->view('add',$data);
        }
}

