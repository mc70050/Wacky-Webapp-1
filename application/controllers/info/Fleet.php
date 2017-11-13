<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends Application {

    public $tasks;

    public function __construct() {
        parent::__construct();
    }

//homepage of fleet
    public function index() {
        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Fleet Page (' . $role . ')';

        $source = $this->planes->all();
        $this->data['planes'] = $source;
        //checking if the role is allowed owner and redirecting it to the right view
        if ($role == ROLE_OWNER) {
            $this->data['pagebody'] = 'fleetx';
        } else {
            $this->data['pagebody'] = 'fleet';
        }
        $this->render();
    }

    public function add() {

        $this->load->helper('form');


        /* data of selected plane. */
        $plane = $this->planes->create();
        /* set pagetitle to the id of the plane. */

        $this->session->set_userdata('plane', $plane);


        // loading the adding form
        $this->showit();
    }

    // Delete this item altogether
    function delete() {
        $dto = $this->session->userdata('plane');
        $plane = $this->planes->get($dto->id);
        $this->planes->delete($plane->id);
        $this->session->unset_userdata('plane');
        redirect('/fleet');
    }

    public function edit($id = null) {
        if ($id == null) {
            redirect('/fleet');
        }
    }

    private function showit() {
        $this->load->helper('form');

        // if no errors, pass an empty message
        $plane = $this->session->userdata('plane');
        $this->data['id'] = $plane->id;

        if (!isset($this->data['error'])) {
            $this->data['error'] = '';
        }
        //creating forms to be shown
        $fields = array(
            'ffleetId' => form_label('FleetId') . form_dropdown('fleetId', $this->app->fleetId(), $plane->id),
            'fmanufacturer' => form_label('Manufacturer') . form_dropdown('manufacturer', $this->app->manufacturer(), $plane->manufacturer),
            'fmodel' => form_label('Model') . form_dropdown('model', $this->app->model(), $plane->model),
            'fprice' => form_label('Price') . form_dropdown('price', $this->app->price(), $plane->price),
            'fseats' => form_label('Seats') . form_dropdown('seats', $this->app->seats(), $plane->seats),
            'freach' => form_label('Reach') . form_dropdown('reach', $this->app->reach(), $plane->reach),
            'fcruise' => form_label('Cruise') . form_dropdown('cruise', $this->app->cruise(), $plane->cruise),
            'ftakeoff' => form_label('Takeoff') . form_dropdown('takeoff', $this->app->takeoff(), $plane->takeoff),
            'zsubmit' => form_submit('submit', 'Update the TODO task'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'fleetitemedit';
        $this->render();
    }

    // handle form submission
    public function submit() {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->planes->rules());

        // retrieve & update data transfer buffer
        $plane = (array) $this->session->userdata('plane');
        $plane = array_merge($plane, $this->input->post());
        $plane = (object) $plane;  // convert back to object
        $this->session->set_userdata('plane', (object) $plane);

        // validate away
        if ($this->form_validation->run()) {
            if (empty($plane->id)) {
                //$plane->id = $this->planes->highest() + 1;
                $this->planes->add($plane);
                //$this->alert('plane ' . $plane->id . ' added', 'success');
            } else {
                $this->planes->update($plane);
                $this->alert('plane ' . $plane->id . ' updated', 'success');
            }
        } else {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
    }

}
