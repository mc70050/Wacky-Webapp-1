<?php
// Backward compatibility
if (!class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase','PHPUnit_Framework_TestCase');
}

/**
 * Class FlightsModelTest
 *
 * @author Daniel Park
 */
class FlightsModelTest extends PHPUnit_Framework_TestCase {
    private $CI;

    public function setUp() {
        $this->CI = &get_instance();
    }

    public function testValidAirport() {
        $flights = $this->CI->flights_model->all();
        // Valid airport destinations
        $airports = ["YCG", "ZGF", "ZMH", "YCW"];

        foreach ($flights as $flight) {
            $this->assertContains($flight->departure, $airports);
            $this->assertContains($flight->arrival, $airports);
        }
    }

    public function testValidDepartureTimes() {
        $flights = $this->CI->flights_model->all();

        foreach ($flights as $flight) {
            // Check if the departure times are before 08:00
            $this->assertGreaterThanOrEqual(strtotime("08:00"), strtotime($flight->departureTime));
            // Check if the departure times are past 22:00
            $this->assertLessThanOrEqual(strtotime("22:00"), strtotime($flight->departureTime));
        }
    }

    public function testValidArrivalTimes() {
        $flights = $this->CI->flights_model->all();

        foreach ($flights as $flight) {
            // Check if the arrival times are before 08:00
            $this->assertGreaterThanOrEqual(strtotime("08:00"), strtotime($flight->arrivalTime));
            // Check if the arrival times are past 22:00
            $this->assertLessThanOrEqual(strtotime("22:00"), strtotime($flight->arrivalTime));
        }
    }

    public function testFlightDowntime() {
        $flights = $this->CI->flights_model->all();
        usort($flights, "cmp");

        for ($i = 1; $i < sizeof($flights); ++$i)
            if ($flights[$i - 1]->model === $flights[$i]->model) {
                $timeArrival = strtotime($flights[$i - 1]->arrivalTime);
                $timeDeparture = strtotime($flights[$i]->departureTime);
                // Get downtime in minutes
                $downtime = ($timeDeparture - $timeArrival) / 60;
                // Check if the downtime is greater than or equal to 30
                $this->assertGreaterThanOrEqual(30, $downtime);
            }
    }

    public function testAllFlightsReturned() {
        $flights = $this->CI->flights_model->all();
        usort($flights, "cmp");

        for ($i = 0; $i < sizeof($flights) - 1; ++$i)
            if ($flights[$i]->model != $flights[$i + 1]->model)
                // Check if the flights have returned to the base
                $this->assertEquals("YCG", $flights[$i]->arrival);
            else if ($i == sizeof($flights) - 2)
                // Check if the last flight returned to base
                $this->assertEquals("YCG", $flights[$i + 1]->arrival);
    }
}

// return -1 or 1 of $a's model/arrivalTime is earlier, equal to, or later than $b's
function cmp($a, $b) {
    if ($a->model == $b->model)
        return ($a->arrivalTime < $b->arrivalTime) ? -1 : 1;

    return ($a->model < $b->model) ? -1 : 1;
}