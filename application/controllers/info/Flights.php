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
        $this->data['pagetitle'] = 'Flights Page (' . $role . ')';
        $source = $this->flights_model->all();
        foreach ($source as $flight)
            $cells[] = $this->parser->parse('_cell', (array) $flight, true);

        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class="table">'
        );
        $this->table->set_template($parms);
        $this->table->set_heading('', 'ID', 'Departure', 'Arrival');
        $rows = $this->table->make_columns($cells, 1);

        $this->data['table'] = $this->table->generate($rows);
        //checking if the role is allowed owner and redirecting it to the right view
        if ($role == ROLE_OWNER) {
            $this->data['pagebody'] = 'flightsx';
        } else {
            $this->data['pagebody'] = 'flights_page';
        }
        $this->data['flights_model'] = $source;
        $this->render();
    }

    public function add() {

        $this->load->helper('form');


        /* data of selected plane. */
        $plane = $this->flights_model->create();
        /* set pagetitle to the id of the plane. */

        $this->session->set_userdata('plane', $plane);


        // loading the adding form
        $this->showit();
    }

    // Delete this item altogether
    function delete() {
        $dto = $this->session->userdata('plane');
        $plane = $this->flights_model->get($dto->id);
        $this->flights_model->delete($plane->id);
        $this->session->unset_userdata('plane');
        redirect('/flights');
    }

    public function edit($id = null) {
        if ($id == null) {
            redirect('/flights');
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
        //Flight ID Model Departure Arrival Departure Time Arrival Time
        $fields = array(
            'fflightId' => form_label('FlightId') . form_dropdown('flightId', $this->app->flightId(), $plane->id),
            'fmodel' => form_label('Model') . form_dropdown('model', $this->app->model(), $plane->model),
            'fdepart' => form_label('Departure') . form_dropdown('departure', $this->app->price(), $plane->departure),
            'farrival' => form_label('Arrival') . form_dropdown('arrival', $this->app->arrival(), $plane->arrival),
            'fdtime' => form_label('Departure Time') . form_dropdown('dTime', $this->app->dTime(), $plane->departureTime),
            'fatime' => form_label('Arrival Time') . form_dropdown('aTime', $this->app->aTime(), $plane->arrivalTime),
            'zsubmit' => form_submit('submit', 'Update the Flight'),
        );
        $this->data = array_merge($this->data, $fields);
        $this->data['pagebody'] = 'flightitemedit';
        $this->render();
    }

    // handle form submission
    public function submit() {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->planes->rules());

        $newFlight = array(
            $this->app->flightId()[$this->input->post('flightId')],
            $this->app->model()[$this->input->post('model')],
            $this->app->departure()[$this->input->post('departure')],
            $this->app->arrival()[$this->input->post('arrival')],
            $this->app->dTime()[$this->input->post('dTime')],
            $this->app->aTime()[$this->input->post('aTime')]
        );
        // retrieve & update data transfer buffer
        $plane = (array) $this->session->userdata('plane');
        $plane = array_merge($newFlight, $plane);
        $plane = (object) $plane;  // convert back to object
        $this->session->set_userdata('plane', (object) $plane);

        // validate away
        if ($this->form_validation->run()) {
            if (empty($plane->id)) {
                //$plane->id = $this->planes->highest() + 1;
                $this->flights_model->add($plane);
                //$this->alert('plane ' . $plane->id . ' added', 'success');
            } else {
                $this->flights_model->update($plane);
                $this->alert('plane ' . $plane->id . ' updated', 'success');
            }
        } else {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
    }

}
