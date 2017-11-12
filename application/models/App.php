<?php

/**
 * Domain-specific lookup tables
 */
class App extends CI_Model
{
	// task groups
	private $departure = [
		1	 => 'YCG',
		2	 => 'ZGF',
                3        => 'ZMH',
                4        => 'YCW'
	];
	// task priorities
	private $destination = [
		1	 => 'Castlegar',
		2	 => 'Grand Forks',
                3        => 'South Cariboo Region',
                4        => 'Chilliwack'
	];


	public function __construct()
	{
		parent::__construct();
	}

    public function departure($which = null) {
        return isset($which) ?
            (isset($this->departure[$which]) ? $this->departure[$which] : 'Unknown') :
            $this->departure;
    }

    public function destination($which = null) {
        return isset($which) ?
            (isset($this->destination[$which]) ? $this->destination[$which] : '') :
            $this->destination;
    }
}
