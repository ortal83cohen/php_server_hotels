<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */
abstract class Hotel
{
    public static $HOTELS_EAN = "ean";
    public static $HOTELS_BOOKING = "booking";
    public $id;
    public $link;
    public $originalLink;
    public $price;
    public $taxes;
    public $imageUrl;
    public $vendor;

    /**
     * HotelInterface constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
        if ($this instanceof HotelEan) {
            $this->vendor = Hotel::$HOTELS_EAN;
        } elseif ($this instanceof HotelBooking) {
            $this->vendor = Hotel::$HOTELS_BOOKING;
        }

        $this->link = "https://$_SERVER[HTTP_HOST]/redirect/hotel/$this->vendor/$this->id";

    }

    public abstract function getId();
}

