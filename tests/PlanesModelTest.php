<?php
// Backward compatibility
if (!class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase','PHPUnit_Framework_TestCase');
}

/**
 * Class PlanesModelTest
 *
 * @author Daniel Park
 */
class PlanesModelTest extends PHPUnit_Framework_TestCase {
    private $CI;

    public function setUp() {
        $this->CI = &get_instance();
    }

    // Test if the planes are valid
    public function testValidPlanes() {
        $planes = $this->CI->planes->all();
        $validAircraftModels = ["Avanti II", "Baron", "Grand Caravan EX", "Citation M2",
            "King Air C90", "Citation Mustang", "PC-12 NG", "Phenom 100",];

        foreach ($planes as $plane)
            $this->assertContains($plane->model, $validAircraftModels);
    }

    // Test if the fleet meets the budget limit of $10,000,000
    public function testValidValueOfFleet() {
        $planes = $this->CI->planes->all();
        $totalCost = 0;

        foreach ($planes as $plane)
            $totalCost += $plane->price;

        $this->assertLessThan(10000000, $totalCost);
    }
}