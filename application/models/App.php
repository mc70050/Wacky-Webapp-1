<?php

/**
 * Domain-specific lookup tables
 */
class App extends CI_Model {

//Fleet ID Manufacturer Model Price Seats Reach Cruise Takeoff Hourly
//Flight ID Model Departure Arrival Departure Time Arrival Time
// task flags
    private $flags = [
        1 => 'Urgent',
    ];
    // task cruise
    private $cruise = [
        1 => '500',
        2 => '630',
        3 => '704',
        4 => '589'
    ];
    // task cruise
    private $departure = [
        1 => 'YCG',
        2 => 'ZGF',
        3 => 'ZMH',
        4 => 'YCW'
    ];
    // task cruise
    private $arrival = [
        1 => 'YCG',
        2 => 'ZGF',
        3 => 'ZMH',
        4 => 'YCW'
    ];
    // task cruise
    private $dTime = [
        1 => '08:00',
        2 => '10:30',
        3 => '13:30',
        4 => '11:00'
    ];
// task cruise
    private $aTime = [
        1 => '10:00',
        2 => '13:00',
        3 => '14:30',
        4 => '14:00'
    ];
// task takeoff
    private $takeoff = [
        1 => '1402',
        2 => '950',
        3 => '1036',
        4 => '994'
    ];
// task hourly
    private $hourly = [
        1 => '990',
        2 => '1015',
        3 => '926',
        4 => '977'
    ];
// task fleetId
    private $fleetId = [
        1 => 'C1',
        2 => 'C2',
        3 => 'C3',
        4 => 'C4',
        5 => 'C5'
    ];
// task seats
    private $seats = [
        1 => '12',
        2 => '4',
        3 => '8',
        4 => '9'
    ];
// task reach
    private $reach = [
        1 => '2446',
        2 => '2130',
        3 => '2148',
        4 => '2797',
        5 => '4147'
    ];
// task flightId
    private $flightId = [
        1 => 'C0001',
        2 => 'C0002',
        3 => 'C0003',
        4 => 'C0004',
        5 => 'C0005'
    ];
// task manufacturer
    private $manufacturer = [
        1 => 'Beechcraft',
        2 => 'Cessna',
        3 => 'Embraer',
        4 => 'Piaggo',
        5 => 'Pilatus'
    ];
// task model
    private $model = [
        1 => 'King Air C90',
        2 => 'Citation Mustang',
        3 => 'Phenom 100',
        4 => 'Avanti II',
        5 => 'PC-12 NG'
    ];
// task price
    private $price = [
        1 => '3900',
        2 => '2770',
        3 => '2980',
        4 => '7195',
        5 => '3300'
    ];
    // task destination
    private $destination = [
        1 => 'YCG',
        2 => 'ZGF',
        3 => 'ZMH',
        4 => 'YCW'
        /*
        1 => 'Castlegar',
        2 => 'Grand Forks',
        3 => 'South Cariboo Region',
        4 => 'Chilliwack'
         */
    ];

    public function __construct() {
        parent::__construct();
    }

    public function flag($which = null) {
        return isset($which) ?
                (isset($this->flags[$which]) ? $this->flags[$which] : '') :
                $this->flags;
    }

    public function fleetId($which = null) {
        return isset($which) ?
                (isset($this->fleetId[$which]) ? $this->fleetId[$which] : 'Unknown') :
                $this->fleetId;
    }
        public function price($which = null) {
        return isset($which) ?
                (isset($this->price[$which]) ? $this->price[$which] : 'Unknown') :
                $this->price;
    }

    public function manufacturer($which = null) {
        return isset($which) ?
                (isset($this->manufacturer[$which]) ? $this->manufacturer[$which] : 'Unknown') :
                $this->manufacturer;
    }

    public function model($which = null) {
        return isset($which) ?
                (isset($this->model[$which]) ? $this->model[$which] : 'Unknown') :
                $this->model;
    }

    public function seats($which = null) {
        return isset($which) ?
                (isset($this->seats[$which]) ? $this->seats[$which] : '') :
                $this->seats;
    }

    public function reach($which = null) {
        return isset($which) ?
                (isset($this->reach[$which]) ? $this->reach[$which] : '') :
                $this->reach;
    }

    public function cruise($which = null) {
        return isset($which) ?
                (isset($this->cruise[$which]) ? $this->cruise[$which] : '') :
                $this->cruise;
    }

    public function takeoff($which = null) {
        return isset($which) ?
                (isset($this->takeoff[$which]) ? $this->takeoff[$which] : '') :
                $this->takeoff;
    }

    public function hourly($which = null) {
        return isset($which) ?
                (isset($this->hourly[$which]) ? $this->hourly[$which] : '') :
                $this->hourly;
    }

    public function flightId($which = null) {
        return isset($which) ?
                (isset($this->flightId[$which]) ? $this->flightId[$which] : '') :
                $this->flightId;
    }

    public function departure($which = null) {
        return isset($which) ?
                (isset($this->departure[$which]) ? $this->departure[$which] : '') :
                $this->departure;
    }

    public function arrival($which = null) {
        return isset($which) ?
                (isset($this->arrival[$which]) ? $this->arrival[$which] : '') :
                $this->arrival;
    }

    public function aTime($which = null) {
        return isset($which) ?
                (isset($this->aTime[$which]) ? $this->aTime[$which] : '') :
                $this->aTime;
    }

    public function dTime($which = null) {
        return isset($which) ?
                (isset($this->dTime[$which]) ? $this->dTime[$which] : '') :
                $this->dTime;
    }

    public function destination($which = null) {
        return isset($which) ?
                (isset($this->destination[$which]) ? $this->destination[$which] : '') :
                $this->destination;
    }

//Fleet ID Manufacturer Model Price Seats Reach Cruise Takeoff Hourly
//Flight ID Model Departure Arrival Departure Time Arrival Time
}
