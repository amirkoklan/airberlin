<?php

class Search extends CI_Controller {

        public function index()
        {
            $this->load->model('database_model');
            $searchResutls = array();
            
            if($this->input->get()){
                $searchResutls = $this->database_model->getResultsByDestinationAndDeparture($this->input->get()['departure'],$this->input->get()['destination']);
                //$results = $this->database_model->get('mileage_credit',$id);
            }
            
            $departures = $this->database_model->getDepartures();
            $destinations = $this->database_model->getDestinations();
            
            
            $data = array('destinations' => $destinations,'departures'=>$departures, 'searchResults' => $searchResutls);
            $this->load->view('search',$data);
        }
        
        public function save(){
            
        }
}