<?php
/**
 * Distance test
 *
 * Get distance between two locations.
 *
 * @author Jeroen Desloovere <jeroen@siesqo.be>
 * @date 20130826
 */
 
 // require
 require '../src/Distance/Distance.php';
 
 // demo variables
 $latitude1 = '';
 $longitude1 = '';
 $latitude2 = '';
 $longitude2 = '';
 
 // get distance between
 $distance = Distance::between($latitude1, $longitude1, $latitude2, $longitude2);
 
 // dump data
 echo 'Distance between is ' . $distance . ' km';
 