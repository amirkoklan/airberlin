<?php

class Add extends CI_Controller {
    public function index()
        {
            $data = array();
            $this->load->view('add',$data);
        }
    public function addNewMile(){
        $this->load->model('database_model');
        if($this->database_model->insert($this->input->post())){
            header('Content-Type: application/json');
            echo json_encode( "Your data has been saved into DB!" );
            exit;
        }        
        header('Content-Type: application/json');
        echo json_encode( "Your data has not been saved into DB!" );  
        exit;
    }
}

