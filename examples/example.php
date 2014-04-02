<?php
/**
 * Distance test
 *
 * Get distance between two locations.
 *
 * @author Jeroen Desloovere <jeroen@siesqo.be>
 */

// autoload files using Composer autoload
require_once __DIR__ . '/../src/JeroenDesloovere/Distance/Distance.php';

use JeroenDesloovere\Distance;

// demo variables
$latitude1 = '50.8538510000';
$longitude1 = '3.3550450000';
$latitude2 = '50.8325600000';
$longitude2 = '3.4787650000';

// define multiple items
$items = array(
    array(
        'title' => 'waregem',
        'latitude' =>'50.8865040000',
        'longitude' => '3.4320850000'
    ),
    array(
        'title' => 'Anzegem',
        'latitude' =>'50.8325600000',
        'longitude' => '3.4787650000'
    )
);

// get distance between
$distance = Distance::between($latitude1, $longitude1, $latitude2, $longitude2);

// dump data
echo 'Distance between is ' . $distance . ' km';

// get closest distance between
$distance = Distance::getClosest($latitude1, $longitude1, $items);

// dump data
echo 'Distance between is ' . $distance['distance'] . ' km';
