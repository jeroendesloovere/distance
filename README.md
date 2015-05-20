# Distance class
[![Latest Stable Version](http://img.shields.io/packagist/v/jeroendesloovere/distance.svg)](https://packagist.org/packages/jeroendesloovere/distance)
[![License](http://img.shields.io/badge/license-MIT-lightgrey.svg)](https://github.com/jeroendesloovere/distance/blob/master/LICENSE)
[![Build Status](http://img.shields.io/travis/jeroendesloovere/distance.svg)](https://travis-ci.org/jeroendesloovere/distance)

Get distance between two locations using PHP. The distance is getting calculated based on latitude and logitude variables and without using any other external class.

## Usage

### Installing using Composer

When using [Composer](https://getcomposer.org) you can always load in the latest version.

```bash
{
    "require": {
        "jeroendesloovere/distance": "1.0.*"
    }
}
```
> Check [in Packagist](https://packagist.org/packages/jeroendesloovere/distance).

### Example

**Setting our example data**

```php
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
```

**Get distance between two locations**

```php
$distance = Distance::between(
    $latitude1,
    $longitude1,
    $latitude2,
    $longitude2
);

// dump data
echo 'Distance between the two locations = ' . $distance . ' km';
```

**Get closest distance from location 1 to one of the two locations (2 and 3)**
```php
$distance = Distance::getClosest(
    $latitude1,
    $longitude1,
    $items
);

// dump data
echo 'The closest location to location 1 is ' . $distance['title'] . ' and the distance between them is ' . $distance['distance'] . ' km';
```

## Documentation

The class is well documented inline. If you use a decent IDE you'll see that each method is documented with PHPDoc.

## Contributing

It would be great if you could help us improve this class. GitHub does a great job in managing collaboration by providing different tools, the only thing you need is a [GitHub](http://github.com) login.

* Use **Pull requests** to add or update code
* **Issues** for bug reporting or code discussions
* Or regarding documentation and how-to's, check out **Wiki**
More info on how to work with GitHub on help.github.com.

## License

The module is licensed under [MIT](./LICENSE.md). In short, this license allows you to do everything as long as the copyright statement stays present.