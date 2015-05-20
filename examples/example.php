<?php

/**
 * Distance test
 *
 * Get distance between two locations.
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */

require_once __DIR__ . '/../vendor/autoload.php';

use JeroenDesloovere\Distance\Distance;

// first location
$latitude1 = '50.8538510000';
$longitude1 = '3.3550450000';

// second location
$latitude2 = '50.8325600000';
$longitude2 = '3.4787650000';

// third location
$latitude3 = '50.8865040000';
$longitude3 = '3.4320850000';

// define multiple items
$items = array(
    array(
        'title' => 'location 2',
        'latitude' => $latitude2,
        'longitude' => $longitude2
    ),
    array(
        'title' => 'location 3',
        'latitude' => $latitude3,
        'longitude' => $longitude3
    )
);

// get distance between two locations
$distance = Distance::between(
    $latitude1,
    $longitude1,
    $latitude2,
    $longitude2
);

// dump data
echo 'Distance between the two locations = ' . $distance . ' km';

// get closest distance from location 1 to one of the two locations (2 and 3)
$distance = Distance::getClosest(
    $latitude1,
    $longitude1,
    $items
);

// dump data
echo 'The closest location to location 1 is ' . $distance['title'] . ' and the distance between them is ' . $distance['distance'] . ' km';
