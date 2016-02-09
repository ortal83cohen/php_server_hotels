<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */
class HotelEan extends Hotel
{

    public function __construct($hotel)
    {
        parent::__construct($hotel->hotel);
        $this->originalLink = $hotel->url;
        $this->price = $hotel->price_for_currency;
        $this->taxes = $hotel->taxes_p_p;
        $this->imageUrl = $hotel->main_image;
        $this->vendor = Hotel::$HOTELS_EAN ;
    }

    public function getId()
    {
        // TODO: Implement getId() method.
    }
}