<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends Application {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['pagebody'] = 'fleet';
        $source = $this->planes->all();
        header("Content-type: application/json");
        $flights = $this->flights_model->all();
        header("Content-type: application/json");

        echo json_encode($source, JSON_PRETTY_PRINT);
        echo json_encode($flights, JSON_PRETTY_PRINT);
    }

    public function fleet() {
        $source = $this->planes->all();
        header("Content-type: application/json");
        echo json_encode($source, JSON_PRETTY_PRINT);
    }

    public function flights() {
        $flights = $this->flights_model->all();
        header("Content-type: application/json");
        echo json_encode($flights, JSON_PRETTY_PRINT);
    }

}
