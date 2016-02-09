<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/8/2016
 */
interface RequestHolder
{
    public function setRequestParameters($place, $checkIn, $checkOut, $roomComposition, $priceRange);

    function createRequest();
}