<?php
/**
 * Class Plane
 *
 * @author Daniel Park
 */
class Plane extends Entity {
    private $id;
    private $manufacturer;
    private $model;
    private $price;
    private $seats;
    private $reach;
    private $cruise;
    private $takeoff;
    private $hourly;

    // Set the id of the plane
    public function setId($id) {
        // ID must start with a capital letter and contain at least 1 number
        if (preg_match('/^[A-Z][0-9]{1,}$/', $id))
            $this->id = $id;
    }

    // Set the plane type
    public function setManufacturer($manufacturer) {
        $manufacturers = array("Beechcraft", "Cessna", "Embraer", "Piaggo", "Pilatus");

        if (in_array($manufacturer, $manufacturers))
            $this->manufacturer = $manufacturer;
    }

    // Set the model of the plane
    public function setModel($model) {
        $models = array("Phenom 100", "Citation Mustang", "Avanti II", "PC-12 NG", "King Air C90");

        if (in_array($model, $models))
            $this->model = $model;
    }

    // Set the price of the plane
    public function setPrice($price) {
        // Format: 4 digits
        if (preg_match('/^[1-9][0-9]{3,}$/', $price))
            $this->price = $price;
    }

    // Set the number of seats
    public function setSeats($seats) {
        if ($seats > 0)
            $this->seats = $seats;
    }

    // Set the reach number
    public function setReach($reach) {
        if ($reach > 0)
            $this->reach = $reach;
    }

    // Set the cruise
    public function setCruise($cruise) {
        if ($cruise > 0)
            $this->cruise = $cruise;
    }

    // Set the takeoff
    public function setTakeoff($takeoff) {
        if ($takeoff > 0)
            $this->takeoff = $takeoff;
    }

    // Set the hour
    public function setHourly($hourly) {
        if ($hourly > 0)
            $this->hourly = $hourly;
    }

    // Return plane ID
    public function getId() {
        return $this->id;
    }

    // Return plane type
    public function getManufacturer() {
        return $this->manufacturer;
    }

    // Return plane model
    public function getModel() {
        return $this->model;
    }

    // Return the price of the plane
    public function getPrice() {
        return $this->price;
    }

    // Return the number of seats
    public function getSeats() {
        return $this->seats;
    }

    public function getReach() {
        return $this->reach;
    }

    public function getCruise() {
        return $this->cruise;
    }

    public function getTakeoff() {
        return $this->takeoff;
    }

    public function getHourly() {
        return $this->hourly;
    }
}