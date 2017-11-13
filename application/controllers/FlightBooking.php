<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Flight booking page is responsible for allowing users to book flights
 * based on their selection
 * 
 * @author Terence
 */
class FlightBooking extends Application {

    /**
     * FlightBooking controller
     */
    public function index() {
        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Flight Booking ('. $role . ')';
        $this->load->helper('form');

        // if no errors, pass an empty message
        if (!isset($this->data['error']))
            $this->data['error'] = '';

        $flights = $this->session->userdata('flight');

        //set up form fields
        $fields = array(
            'fdeparture' => form_label('From') . form_dropdown('departure', $this->app->departure(),
                    $flights->departure),
            'fdestination' => form_label('To') . form_dropdown('destination', $this->app->destination(),
                    $flights->destination),
            'zsubmit' => form_submit('submit', 'Check Availability'),
        );

        $this->data = array_merge($this->data, $fields);
        $this->data['pagebody'] = 'flightbooking';
        $this->render();
    }

    // handle form submission
    public function submit() {
        $flight = $this->input->post();
        $this->session->set_userdata('flight', (object) $flight);
        $this->showit();
    }

    private function showit() {
        $this->data['pagetitle'] = 'Search Results';
        $flights = $this->session->userdata('flight');
        $flightOptions = [];
        //grab all flights
        $source = $this->flights_model->all();
        $departure = $this->app->departure($flights->departure);
        $destination = $this->app->destination($flights->destination);
        
        //store into an array flights that match the selection
        foreach ($source as $flight) {
            if ($flight->departure == $departure && $flight->arrival == $destination) {
                array_push($flightOptions, $flight);
            }
        }
        
        //show
        $this->data['pagebody'] = 'flights_page';
        $this->data['flights_model'] = $flightOptions;
        $this->render();
    }
}
