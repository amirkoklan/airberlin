<?php

class Add extends CI_Controller {
    public function index()
        {
            $this->load->model('database_model');
            $data = array();
            $data['results'] = $this->database_model->get('mileage_credit');
            $this->load->view('add',$data);
        }
    public function addNewMile(){
        $this->load->model('database_model');
        if($this->database_model->insert($this->input->post())){
            header('Content-Type: application/json');
            echo '<div class="alert alert-success">Your data has been saved into DB!</div>';
            exit;
        }        
        header('Content-Type: application/json');
        echo '<div class="alert alert-success">Your data has not been saved into DB!</div>';  
        exit;
    }
}

