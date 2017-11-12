<?php
include_once('../application/models/Plane.php');
// Backward compatibility
if (!class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase','PHPUnit_Framework_TestCase');
}

/**
 * Class PlaneTest
 *
 * @author Daniel Park
 */
class PlaneTest extends PHPUnit_Framework_TestCase {
    private $plane;

    public function setUp() {
        $this->plane = new Plane();
    }

    public function testId() {
        $this->plane->__set("id", "C2");
        $this->assertEquals("C2", $this->plane->getId());
    }

    public function testCorrectManufacturer() {
        $this->plane->__set("manufacturer", "Piaggo");
        $this->assertEquals("Piaggo", $this->plane->getManufacturer());
    }

    public function testCorrectModel() {
        $this->plane->__set("model", "Citation Mustang");
        $this->assertEquals("Citation Mustang", $this->plane->getModel());
    }

    public function testCorrectPrice() {
        $this->plane->__set("price", "3000");
        $this->assertEquals("3000", $this->plane->getPrice());
    }

    public function testSeatNumbers() {
        $this->plane->__set("seats", "10");
        $this->assertEquals("10", $this->plane->getSeats());
    }

    public function testReach() {
        $this->plane->__set("reach", "2000");
        $this->assertEquals("2000", $this->plane->getReach());
    }

    public function testCruise() {
        $this->plane->__set("cruise", "500");
        $this->assertEquals("500", $this->plane->getCruise());
    }

    public function testTakeoff() {
        $this->plane->__set("takeoff", "611");
        $this->assertEquals("611", $this->plane->getTakeoff());
    }

    public function testHourly() {
        $this->plane->__set("hourly", "990");
        $this->assertEquals("990", $this->plane->getHourly());
    }
}