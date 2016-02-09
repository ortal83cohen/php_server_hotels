<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */
class WorkerHotelsBooking extends WorkerHotels implements RequestHolder
{
    private $request;


    public function setRequestParameters($place, $checkIn, $checkOut, $roomComposition, $priceRange)
    {
        $this->request = new Request($place, $checkIn, $checkOut, $roomComposition, $priceRange);
    }

    public function fetchVendorData()
    {
// here should be a call to booking API with dal wrapper and cache, this data is only example though I now it's nothing like real api return.
        foreach (json_decode($this->MOCK_DATA) as $hotel) {
            array_push($this->data, new HotelBooking($hotel));
        }
    }


    function createRequest()
    {
        //assuming I have all this data in my Request Object  $this->request
        return "
                <HotelListRequest>
                    <city>Seattle</city>
                    <stateProvinceCode>WA</stateProvinceCode>
                    <countryCode>US</countryCode>
                    <arrivalDate>3/9/2016</arrivalDate>
                    <departureDate>3/11/2016</departureDate>
                    <RoomGroup>
                        <Room>
                            <numberOfAdults>2</numberOfAdults>
                        </Room>
                    </RoomGroup>
                    <numberOfResults>25</numberOfResults>
                </HotelListRequest>";
    }

    // this simple data is only as example fo different data that the api fan return
    private $MOCK_DATA = "[
  {
    \"rate_id\": 100,
    \"page_url\": \"http://www.booking.com/hotel/il/club-house-luxury-seaside-apartments-tel-aviv.en-gb.html?label=gen173nr-15CAEoggJCAlhYSDNiBW5vcmVmaGqIAQGYAS64AQTIAQTYAQPoAQE;sid=eaef1e051f6a2e1d771a0b7ed2aaa4cf;dcid=1;dist=0;group_adults=2;room1=A%2CA;sb_price_type=total;srfid=a6ca951d156a34c55d1cbb360613362012a6fb96X2;type=total;ucfs=1&\",
    \"rate_price\": 123,
    \"total_taxes\": 343,
    \"images\": [
    \"http://q-ec.bstatic.com/images/hotel/840x460/622/62248431.jpg\",
    \"http://q-ec.bstatic.com/images/hotel/840x460/622/62247168.jpg\"
    ]
    },
    {
        \"rate_id\": 101,
        \"page_url\": \"http://www.booking.com/hotel/il/the-norman-tel-aviv-tel-aviv.en-gb.html?label=gen173nr-15CAEoggJCAlhYSDNiBW5vcmVmaGqIAQGYAS64AQTIAQTYAQPoAQE;sid=eaef1e051f6a2e1d771a0b7ed2aaa4cf;dcid=1;dist=0;group_adults=2;room1=A%2CA;sb_price_type=total;srfid=a6ca951d156a34c55d1cbb360613362012a6fb96X5;type=total;ucfs=1&\",
        \"rate_price\": 234,
        \"total_taxes\": 55,
        \"images\": [
        \"http://q-ec.bstatic.com/images/hotel/840x460/318/31882523.jpg\",
        \"http://r-ec.bstatic.com/images/hotel/840x460/311/31155620.jpg\"
    ]
      },
    {
        \"rate_id\": 102,
        \"page_url\": \"http://www.booking.com/hotel/il/the-savoy-tel-aviv-sea-side.en-gb.html?label=gen173nr-15CAEoggJCAlhYSDNiBW5vcmVmaGqIAQGYAS64AQTIAQTYAQPoAQE;sid=eaef1e051f6a2e1d771a0b7ed2aaa4cf;dcid=1;dist=0;group_adults=2;room1=A%2CA;sb_price_type=total;srfid=a6ca951d156a34c55d1cbb360613362012a6fb96X7;type=total;ucfs=1&\",
        \"rate_price\": 654,
        \"total_taxes\": 352,
        \"images\": [
        \"http://q-ec.bstatic.com/images/hotel/840x460/180/18099128.jpg\"
    ]
      },
    {
        \"rate_id\": 103,
        \"page_url\": \"http://www.booking.com/hotel/il/herbert-samuel-by-the-beach.en-gb.html?label=gen173nr-15CAEoggJCAlhYSDNiBW5vcmVmaGqIAQGYAS64AQTIAQTYAQPoAQE;sid=eaef1e051f6a2e1d771a0b7ed2aaa4cf;dcid=1;dist=0;group_adults=2;room1=A%2CA;sb_price_type=total;srfid=a6ca951d156a34c55d1cbb360613362012a6fb96X14;type=total;ucfs=1&\",
        \"rate_price\": 4345,
        \"total_taxes\": 45,
        \"images\": [
        \"http://q-ec.bstatic.com/images/hotel/840x460/546/54691584.jpg\",
        \"http://q-ec.bstatic.com/images/hotel/840x460/546/54691584.jpg\"
    ]
      }
    ]";
}