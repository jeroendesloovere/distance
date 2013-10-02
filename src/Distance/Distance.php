<?php

/**
 * Distance
 *
 * Get distance between two locations.
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
	 * @return float
	 */
	public static function between($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'km')
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
		return (round($distance, 1));
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
