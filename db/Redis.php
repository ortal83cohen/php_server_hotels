<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/8/2016
 */
class Redis
{


    /**
     * Redis constructor.
     */
    public function __construct()
    {
        // do to lack of time i didn't implemented this class.
        // I intended to use is as tmp cache for each hotel that return from hotels search,
        // the key will be the vendor + hotel id, the value will be original hotel url .

        // I will save the hotels for 10 minutes, if the hotel is not present the server need to call hotels search
        // with the specific id.

    }

    public function saveHotel($key, $value)
    {
        //todo
    }
    public function saveHotels($hotels)
    {
        //todo
    }

    public function getHotelOriginalUrl($vendor, $id)
    {
        //todo
        switch ($vendor) {
            case Hotel::$HOTELS_BOOKING:
                return "http://www.booking.com/index.en-gb.html?label=gen173nr-15CAEoggJCAlhYSDNiBW5vcmVmaGqIAQGYAS64AQTIAQTYAQPoAQE;sid=eaef1e051f6a2e1d771a0b7ed2aaa4cf;dcid=1;bb_ltbi=0&sb_price_type=total&";

            case  Hotel::$HOTELS_EAN :
                return "https://www.expedia.com/Tel-Aviv-Hotels-Sea-Executive-Suites.h3213644.Hotel-Information?chkin=02%2F18%2F2016&chkout=02%2F26%2F2016&rm1=a2&hwrqCacheKey=c8e0e6a4-50bd-4076-a180-4b686358dcd5HWRQ1454931863888&c=adb65b5c-6e79-4040-9f5b-a6d957234302&";
        }

    }
}