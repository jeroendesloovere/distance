<?php

namespace JeroenDesloovere\Distance\tests;

// required to load
require_once __DIR__ . '/../vendor/autoload.php';

/*
 * This file is part of the Distance PHP Class from Jeroen Desloovere.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use JeroenDesloovere\Distance\Distance;

/**
 * Distance test
 *
 * Calculate distance between two or multiple locations using Mathematic functions.
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */
class DistanceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Set up before class
     *
     * @return void
     */
    public function setUp()
    {
        // first location
        $this->latitude1 = '50.8538510000';
        $this->longitude1 = '3.3550450000';

        // second location
        $this->latitude2 = '50.8325600000';
        $this->longitude2 = '3.4787650000';

        // third location
        $this->latitude3 = '50.8865040000';
        $this->longitude3 = '3.4320850000';
    }

    /**
     * Test get distance between two locations
     */
    public function testGetDistanceBetweenTwoLocations()
    {
        $distance = Distance::between(
            $this->latitude1,
            $this->longitude1,
            $this->latitude2,
            $this->longitude2
        );

        $this->assertEquals(9, $distance);
    }

    /**
     * Get closest distance from location 1 to one of the two locations (2 and 3)
     */
    public function test()
    {
        // define multiple items
        $items = array(
            array(
                'title' => 'location 2',
                'latitude' => $this->latitude2,
                'longitude' => $this->longitude2
            ),
            array(
                'title' => 'location 3',
                'latitude' => $this->latitude3,
                'longitude' => $this->longitude3
            )
        );

        // get closest distance from location 1 to one of the two locations (2 and 3)
        $distance = Distance::getClosest(
            $this->latitude1,
            $this->longitude1,
            $items
        );

        $this->assertEquals('location 3', $distance['title']);
        $this->assertEquals(6.5, $distance['distance']);
    }
}
