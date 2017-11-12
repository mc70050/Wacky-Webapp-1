<?php
include_once('../application/models/Flight.php');
// Backward compatibility
if (!class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase','PHPUnit_Framework_TestCase');
}

/**
 * Class FlightTest
 *
 * @author Daniel Park
 */
class FlightTest extends PHPUnit_Framework_Testcase {
    private $flight;

    public function setUp() {
        $this->flight = new Flight();
    }

    public function testId() {
        $this->flight->__set("id", "C0001");
        $this->assertEquals("C0001", $this->flight->getId());
    }

    public function testCorrectModel() {
        $this->flight->__set("model", "Phenom 100");
        $this->assertEquals("Phenom 100", $this->flight->getModel());
    }

    public function testCorrectDepartureAirport() {
        $this->flight->__set("departure", "YCG");
        $this->assertEquals("YCG", $this->flight->getDeparture());
    }

    public function testCorrectArrivalAirport() {
        $this->flight->__set("arrival", "ZGF");
        $this->assertEquals("ZGF", $this->flight->getArrival());
    }

    public function testCorrectFormatDepartureTime() {
        $this->flight->__set("departureTime", "08:30");
        $this->assertEquals("08:30", $this->flight->getDepartureTime());
    }

    public function testCorrectFormatArrivalTime() {
        $this->flight->__set("arrivalTime", "12:30");
        $this->assertEquals("12:30", $this->flight->getArrivalTime());
    }
}