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
        $insert_id = $this->database_model->insert($this->input->post());
        if($insert_id){
            header('Content-Type: application/json');
            echo $insert_id;
            exit;
        }        
        header('Content-Type: application/json');
        echo '<div class="alert alert-success">Your data has not been saved into DB!</div>';  
        exit;
    }
    public function getByID(){
      $this->load->model('database_model');
      $result = array();
      if($this->input->post()['id']) {  
        $result = $this->database_model->get( 'mileage_credit', $this->input->post()['id'] );
        echo json_encode($result);
      }
      return json_encode($result);
    }
}

