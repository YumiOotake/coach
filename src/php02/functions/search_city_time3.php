<?php

function getCityTime($cityName)
{
    require('./config/cities.php');
    foreach($cities as $index => $city) {
        if ($cityName === $city['name']) {
            return $cities[$index];
        }
    }
}