<?php
include_once('../application/core/Entity.php');

/**
 * Class Flight
 *
 * @author Daniel Park
 */
class Flight extends Entity {
    private $id;
    private $model;
    private $departure;
    private $arrival;
    private $departureTime;
    private $arrivalTime;

    // Set the ID of the flight
    public function setId($id) {
        // ID must start with a capital letter and contain at least 4 numbers
        if (preg_match('/^[A-Z][0-9]{4,}$/', $id))
            $this->id = $id;
    }

    // Set the aircraft model
    public function setModel($model) {
        $models = array("Phenom 100", "Citation Mustang", "Avanti II", "PC-12 NG", "King Air C90");

        if (in_array($model, $models))
            $this->model = $model;
    }

    // Set the departure airport of the flight
    public function setDeparture($name) {
        if (preg_match('/^[A-Z]{3}$/', $name))
            $this->departure = $name;
    }

    // Set the arrival airport of the flight
    public function setArrival($name) {
        if (preg_match('/^[A-Z]{3}$/', $name))
            $this->arrival = $name;
    }

    // Set the departure time of the flight
    public function setDepartureTime($time) {
        // Format: HH:MM
        if (preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $time))
            $this->departureTime = $time;
    }

    // Set the arrival time of the flight
    public function setArrivalTime($time) {
        if (preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $time))
            $this->arrivalTime = $time;
    }

    // Return the id of the flight
    public function getId() {
        return $this->id;
    }

    // Return the aircraft model
    public function getModel() {
        return $this->model;
    }

    // Return the departure airport
    public function getDeparture() {
        return $this->departure;
    }

    // Return the arrival airport
    public function getArrival() {
        return $this->arrival;
    }

    // Return the departure time of the flight
    public function getDepartureTime() {
        return $this->departureTime;
    }

    // Return the arrival time of the flight
    public function getArrivalTime() {
        return $this->arrivalTime;
    }
}
