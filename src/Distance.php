<?php

namespace JeroenDesloovere\Distance;

/**
 * Distance
 *
 * Calculate distance between two or multiple locations using Mathematic functions.
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */
class Distance
{
    /**
     * Get distance between two coordinates
     *
     * @return float
     * @param  decimal $latitude1
     * @param  decimal $longitude1
     * @param  decimal $latitude2
     * @param  decimal $longitude2
     * @param  int     $decimals[optional] The amount of decimals
     * @param  string  $unit[optional]
     */
    public static function between($latitude1, $longitude1, $latitude2, $longitude2, $decimals = 1, $unit = 'km')
    {
        // define calculation variables
        $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;

        // unit is km
        if ($unit == 'km') {
            // redefine distance
            $distance = $distance * 1.609344;
        }

        // return with one decimal
        return round($distance, $decimals);
    }

    /**
     * Get closest location from all locations
     *
     * @return array   The item which is the closest + 'distance' to it.
     * @param  decimal $latitude1
     * @param  decimal $longitude1
     * @param  array   $items = array(array('latitude' => 'x', 'longitude' => 'x'), array(xxx))
     * @param  int     $decimals[optional] The amount of decimals
     * @param  string  $unit[optional]
     */
    public static function getClosest($latitude1, $longitude1, $items, $decimals = 1, $unit = 'km')
    {
        // init result
        $distances = array();

        // loop items
        foreach ($items as $key => $item) {
            // define second item
            $latitude2 = $item['latitude'];
            $longitude2 = $item['longitude'];

            // define distance
            $distance = self::between($latitude1, $longitude1, $latitude2, $longitude2, 10, $unit);

            // add distance
            $distances[$distance] = $key;

            // add rounded distance to array
            $items[$key]['distance'] = round($distance, $decimals);
        }

        // return the item with the closest distance
        return $items[$distances[min(array_keys($distances))]];
    }
}
