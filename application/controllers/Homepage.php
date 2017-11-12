<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Homepage will be the default controller where it will display the number of
 * -planes
 * -flights
 * -airline destinations
 *
 * @author Evan
 */
class Homepage extends Application {

    /*
     * Prints elements in the array for testing purposes.
     */
    public function printArray($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
    
    /*
     * Returns the plane destinations.
     */
    public function getFlightDestination($arr) {
        $destination = array();  
        foreach($arr as $flights) {
            if(!in_array($flights->arrival, $destination)) {
                array_push($destination, $flights->arrival);
            }
        }
        return $destination;
    }
    
    
    
    /**
     * Homepage controller.
     */
    public function index() {
        $flightData = $this->flights_model->all();
        $planesSource = $this->planes->all();
        $destination = $this->getFlightDestination($flightData);
        //Split the array up with commas
        $role = $this->session->userdata('userrole');    
        $this->data['pagetitle'] = 'Homepage ('. $role . ')';
        $this->data['destinationAirline'] = implode(', ', $destination);
        $this->data['numOfPlanes'] = count($planesSource);
        $this->data['numOfFlights'] = count($flightData);
        
        $this->data['pagebody'] = 'homepage';
        $this->render();
    }
}
