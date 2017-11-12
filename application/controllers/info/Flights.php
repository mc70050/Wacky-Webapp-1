<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 2017-10-05
 * Time: 4:50 PM
 */

class Flights extends Application {
    public function index() {
        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Flights Page ('. $role . ')';
        $source = $this->flights_model->all();
        $this->data['pagebody'] = 'flights_page';
        $this->data['flights_model'] = $source;
        $this->render();
    }
}