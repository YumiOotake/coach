
<?php

function searchCityTime($cityName)
{
    require('./config/cities.php');
    foreach ($cities as $city) {
        if ($city['name'] === $cityName) {
            $cityDate = new DateTime('', new DateTimeZone($city['time_zone']));
            $cityDateTime = $cityDate->format('H:i');
            $city['time'] = $cityDateTime;
            return $city;
        }
    }
}
