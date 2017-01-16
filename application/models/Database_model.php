<?php

class Database_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get($table,$id) {
        if ($id != FALSE) {
            $query = $this->db->get_where($table, array('id' => $id));
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
    public function getDepartures() {

            $query = $this->db->get('mileage_credit');            
            $results = $query->result();
            $departures = array();
            foreach ($results as $result){
               array_push($departures, $result->departure);
            }
            
            return array_unique($departures);
    }
    public function getDestinations() {

            $query = $this->db->get('mileage_credit');            
            $results = $query->result();
            $destinations = array();
            foreach ($results as $result){
               array_push($destinations, $result->destination);
            }
            
            return array_unique($destinations);
    }
    public function getResultsByDestinationAndDeparture($departure,$destination){
        $query = $this->db->get_where('mileage_credit', array('departure' => $departure,'destination'=>$destination));
        $results = $query->result();
        return $results;
    }
    public function insert($data){
        $result = $this->db->insert('mileage_credit', $data);
        return $result;
    }

}
