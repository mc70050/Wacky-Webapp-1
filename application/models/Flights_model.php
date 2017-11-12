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
}
