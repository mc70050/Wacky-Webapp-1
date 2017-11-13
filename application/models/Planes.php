<?php

include_once('../application/core/CSV_Model.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Planes
 *
 * @author Michael
 */
class Planes extends CSV_Model {

    public function __construct() {
        parent::__construct(APPPATH . '../data/fleet.csv', 'id');
    }

    public function rules() {
        $config = array(
            ['field' => 'id', 'label' => 'Plane id', 'rules' => 'alpha_numeric_spaces|max_length[4]'],
            ['field' => 'manufacturer', 'label' => 'Manufacturer', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'model', 'label' => 'Model', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'price', 'label' => 'Price', 'rules' => 'numeric|greater_than[0]'],
            ['field' => 'seats', 'label' => 'Number of seats', 'rules' => 'integer|greater_than[0]'],
            ['field' => 'reach', 'label' => 'Reach', 'rules' => 'integer|greater_than[0]'],
            ['field' => 'cruise', 'label' => 'Cruise', 'rules' => 'integer|greater_than[0]'],
            ['field' => 'takeoff', 'label' => 'Takeoff', 'rules' => 'integer|greater_than[0]'],
            ['field' => 'hourly', 'label' => 'Hourly', 'rules' => 'integer|greater_than[0]'],
        );
        return $config;
    }

}
