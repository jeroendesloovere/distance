<?php

/**
 * Distance
 *
 * Get distance between two or multiple locations.
 *
 * @author Jeroen Desloovere <jeroen@siesqo.be>
 */
class Distance
{
	/**
	 * Get distance between two coordinates
	 *
	 * @param decimal $latitude1
	 * @param decimal $longitude1
	 * @param decimal $latitude2
	 * @param decimal $longitude2
	 * @param int $decimals[optional] The amount of decimals
	 * @param string $unit[optional]
	 * @return float
	 */
	public static function between($latitude1, $longitude1, $latitude2, $longitude2, $decimals = 1, $unit = 'km')
	{
		$theta = $longitude1 - $longitude2;
		$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
		$distance = acos($distance);
		$distance = rad2deg($distance);
		$distance = $distance * 60 * 1.1515;

		// unit
		if($unit == 'km')
		{
			$distance = $distance * 1.609344;
		}

		// return with one decimal
		return round($distance, $decimals);
	}

	/**
	 * Get closest location from all locations
	 *
	 * @param decimal $latitude1
	 * @param decimal $longitude1
	 * @param int $decimals[optional] The amount of decimals
	 * @return array The item which is the closest + 'distance' to it.
	 */
	public static function getClosest($latitude1, $longitude1, $items, $decimals = 1)
	{
		// init result
		$distances = array();

		// loop items
		foreach($items as $key => $item)
		{
			// define second item
			$latitude2 = $item['latitude'];
			$longitude2 = $item['longitude'];

			// define distance
			$distance = self::between($latitude1, $longitude1, $latitude2, $longitude2, 10);

			// add distance
			$distances[$distance] = $key;

			// add rounded distance to array
			$items[$key]['distance'] = round($distance, $decimals);
		}

		// return the item with the closest distance
		return $items[$distances[min(array_keys($distances))]];
	}
}


/**
 * Distance Exception
 *
 * @author Jeroen Desloovere <jeroen@siesqo.be>
 */
class DistanceException extends Exception
{
}
