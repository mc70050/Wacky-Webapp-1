<?php
/**
 * Class Wacky_server_model
 *
 * @author Daniel Park
 */
class Wacky_server_model extends CI_Model {
    // Get a list of active airlines
    public function getAllAirlines() {
        $response = file_get_contents('https://wacky.jlparry.com/info/airlines');
        // return an associative array
        return json_decode($response, true);
    }

    // Get a specific airline
    public function getAirline($airline) {
        $response = file_get_contents('https://wacky.jlparry.com/info/airlines/' . $airline);
        return json_decode($response);
    }

    // Get a list of all airports
    public function getAllAirports() {
        $response = file_get_contents('https://wacky.jlparry.com/info/airports');
        return json_decode($response, true);
    }

    // Get a specific airport
    public function getAirport($airport) {
        $response = file_get_contents('https://wacky.jlparry.com/info/airports/' . $airport);
        return json_decode($response);
    }

    // Get a list of all aircrafts
    public function getAllAirplanes() {
        $response = file_get_contents('https://wacky.jlparry.com/info/airplanes');
        return json_decode($response, true);
    }

    // Get a specific aircraft
    public function getAirplane($airplane) {
        $response = file_get_contents('https://wacky.jlparry.com/info/airports/' . $airplane);
        return json_decode($response);
    }

    // Get a list of all the regions
    public function getAllRegions() {
        $response = file_get_contents('https://wacky.jlparry.com/info/regions');
        return json_decode($response, true);
    }

    // Get a specific region
    public function getRegion($region) {
        $response = file_get_contents('https://wacky.jlparry.com/info/airports/' . $region);
        return json_decode($response);
    }
}