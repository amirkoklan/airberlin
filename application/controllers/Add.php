<?php

class Add extends CI_Controller {

    protected $max_date = "2099-12-31";

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
        if ($this->validateEntry($postdata) && !$postdata['id']) {
            if (!$postdata['id']) {
                $insert_id = $this->database_model->insert($postdata);
                if ($insert_id) {
                    header('Content-Type: application/json');
                    echo $insert_id;
                    exit;
                }
            }
        } elseif ($postdata['id']) {
            $this->database_model->updateByID('mileage_credit', $postdata, $postdata['id']);
            header('Content-Type: application/json');
            echo $postdata['id'];
            exit;
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
        $this->load->model('database_model');
        $results = $this->database_model->getResultsByDestinationAndDeparture($data['departure'], $data['destination']);
        $returnValue = FALSE;
        foreach ($results as $result) {
            if ($data['id'] == !$result->id) {
                if ($this->datesOverlap($data['bookingdate_from'], $data['bookingdate_to'], $result->bookingdate_from, $result->bookingdate_to)) {
                    $returnValue = FALSE;
                    break;
                } elseif ($this->datesOverlap($data['flightdate_from'], $data['flightdate_to'], $result->flightdate_from, $result->flightdate_to)) {
                    $returnValue = FALSE;
                    break;
                }
            }

            $returnValue = TRUE;
        }
        return $returnValue;
    }

    private function datesOverlap($s_one, $e_one, $s_two, $e_two) {
        if ($s_one === "0000-00-00") {
            $start_one = new DateTime();
        } else {
            $start_one = new DateTime($s_one);
        }
        if ($s_two === "0000-00-00") {
            $start_two = new DateTime();
        } else {
            $start_two = new DateTime($s_two);
        }
        if ($e_one === "0000-00-00") {
            $end_one = new DateTime($this->max_date);
        } else {
            $end_one = new DateTime($e_one);
        }
        if ($e_two === "0000-00-00") {
            $end_two = new DateTime($this->max_date);
        } else {
            $end_two = new DateTime($e_two);
        }

        if ($start_one <= $end_two && $end_one >= $start_two) {
            return min($end_one, $end_two)->diff(max($start_two, $start_one))->days + 1;
        }

        return 0; // in case of no Overlap
    }

}
