<?php

include_once('../application/core/CSV_Model.php');

/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2017-10-05
 * Time: 4:56 PM
 */
class Flights_model extends CSV_Model {

    public function __construct() {
        parent::__construct(APPPATH . '../data/flights.csv', 'id');
    }

//Flight ID Model Departure Arrival Departure Time Arrival Time
    public function rules() {
        $config = array(
            ['field' => 'id', 'label' => 'Plane id', 'rules' => 'alpha_numeric_spaces|max_length[4]'],
            ['field' => 'model', 'label' => 'Model', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'departure', 'label' => 'Departure', 'rules' => 'numeric|greater_than[0]'],
            ['field' => 'arrival', 'label' => 'Arrival', 'rules' => 'numeric|greater_than[0]'],
            ['field' => 'dtime', 'label' => 'Dtime', 'rules' => 'numeric|greater_than[0]'],
            ['field' => 'atime', 'label' => 'Atime', 'rules' => 'numeric|greater_than[0]'],
        );
        return $config;
    }

}
