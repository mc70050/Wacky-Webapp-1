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
        //$role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Flight Booking';
        $this->load->helper('form');
        $flight = $this->session->userdata('flight');
        //$this->data['id'] = $flight->id;
        // if no errors, pass an empty message
        if (!isset($this->data['error']))
            $this->data['error'] = '';

        //set up form fields
        $fields = array(
            'fdeparture' => form_label('From') . form_dropdown('departure', $this->app->departure()),
            'fdestination' => form_label('To') . form_dropdown('destination', $this->app->destination()),
            'zsubmit' => form_submit('submit', 'Check Availability'),
        );
        $this->data = array_merge($this->data, $fields);
        
        $this->data['pagebody'] = 'flightbooking';
        $this->render();
    }

    // handle form submission
    public function submit() {
        // retrieve & update data transfer buffer
        //$flight = (array) $this->session->userdata('flight');
        //$flight = array_merge($flight, $this->input->post());
        //$flight = (object) $flight;  // convert back to object
        //$this->session->set_userdata('flight', (object) $flight);

        $this->showit();
    }

    private function showit() {
        $this->data['pagetitle'] = 'Search Results';

        $source = $this->flights_model->all();
        //$source = $this->session->set_userdata('flight');
        $this->data['pagebody'] = 'flights_page';
        $this->data['flights_model'] = $source;
        $this->render();
    }

}
