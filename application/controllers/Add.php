<?php

class Add extends CI_Controller {

    public function index() {
        $this->load->model('database_model');
        $data = array();
        $data['results'] = $this->database_model->get('mileage_credit');
        $this->load->helper('url');
        $this->load->view('add', $data);
    }

    public function addOrUpdateNewMile() {
        $this->load->model('database_model');
        $postdata = $this->input->post();
        $this->validateEntry($postdata);
        if ($this->validateEntry($postdata)) {
            if (!$this->input->post()['id']) {
                $insert_id = $this->database_model->insert($postdata);
                if ($insert_id) {
                    header('Content-Type: application/json');
                    echo $insert_id;
                    exit;
                }
            } else {
                $this->database_model->updateByID('mileage_credit', $postdata, $postdata['id']);
                header('Content-Type: application/json');
                echo $postdata['id'];
                exit;
            }
        }
        header('Content-Type: application/json');
        echo '<div class="alert alert-error">Your data has not been saved into DB!</div>';
        exit;
    }

    public function getByID() {
        $this->load->model('database_model');
        $result = array();
        if ($this->input->post()['id']) {
            $result = $this->database_model->get('mileage_credit', $this->input->post()['id']);
            echo json_encode($result);
        }
        return json_encode($result);
    }

    public function removeByID() {
        $this->load->model('database_model');
        $result = array();
        if ($this->input->post()['id']) {
            $result = $this->database_model->remove('mileage_credit', $this->input->post()['id']);
            return json_encode($result);
        }
        return json_encode($result);
    }

    private function validateEntry($data) {
       return false; 
    }

}
