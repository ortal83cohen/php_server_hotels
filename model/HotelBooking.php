<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */
class HotelBooking extends Hotel
{


    /**
     * HotelBooking constructor.
     * @param $hotel
     */
    public function __construct($hotel)
    {
        parent::__construct($hotel->rate_id);
        $this->originalLink = $hotel->page_url;
        $this->price = $hotel->rate_price;
        $this->taxes = $hotel->total_taxes;
        $this->imageUrl = $hotel->images[0];// I display only the first image
        $this->vendor = Hotel::$HOTELS_BOOKING;
    }

    public function getId()
    {
        // TODO: Implement getId() method.
    }
}