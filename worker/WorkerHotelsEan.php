<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */
class WorkerHotelsEan extends WorkerHotels implements RequestHolder
{
    private $request;

    public function setRequestParameters($place, $checkIn, $checkOut, $roomComposition, $priceRange)
    {
        $this->request = new Request($place, $checkIn, $checkOut, $roomComposition, $priceRange);
    }

    public function fetchVendorData()
    {
// here should be a call to Ean API with dal wrapper and cache, this data is only example though I now it's nothing like real api return.
        foreach (json_decode($this->MOCK_DATA) as $hotel) {
            array_push($this->data, new HotelEan($hotel));
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

    private $MOCK_DATA = "[
  {
    \"hotel\": 76543,
    \"url\": \"https://www.expedia.com/Tel-Aviv-Hotels-Sea-Executive-Suites.h3213644.Hotel-Information?chkin=02%2F18%2F2016&chkout=02%2F26%2F2016&rm1=a2&hwrqCacheKey=c8e0e6a4-50bd-4076-a180-4b686358dcd5HWRQ1454931863888&c=adb65b5c-6e79-4040-9f5b-a6d957234302&\",
\"price_for_currency\": 234,
\"taxes_p_p\": 42,
\"main_image\": \"https://images.trvl-media.com/hotels/4000000/3220000/3213700/3213644/3213644_129_l.jpg\"
},
{
    \"hotel\": 342,
    \"url\": \"https://www.expedia.com/Tel-Aviv-Hotels-The-Norman-Tel-Aviv.h8383218.Hotel-Information?chkin=02%2F18%2F2016&chkout=02%2F26%2F2016&rm1=a2&hwrqCacheKey=ea3b1925-c997-4578-882c-eae78ccb2d80HWRQ1455021860237&c=90118bdc-60b0-420c-b4c0-232f875de565&\",
    \"price_for_currency\": 242,
    \"taxes_p_p\": 13,
    \"main_image\": \"https://images.trvl-media.com/hotels/9000000/8390000/8383300/8383218/8383218_31_l.jpg\"
  },
{
    \"hotel\": 3,
    \"url\": \"https://www.expedia.com/Tel-Aviv-Hotels-Sea-Executive-Suites.h3213644.Hotel-Information?chkin=02%2F18%2F2016&chkout=02%2F26%2F2016&rm1=a2&hwrqCacheKey=ea3b1925-c997-4578-882c-eae78ccb2d80HWRQ1455021860237&c=90118bdc-60b0-420c-b4c0-232f875de565&\",
    \"price_for_currency\": 422,
    \"taxes_p_p\": 41,
    \"main_image\": \"https://images.trvl-media.com/hotels/4000000/3220000/3213700/3213644/3213644_129_l.jpg\"
  },
{
    \"hotel\": 5523,
    \"url\": \"https://www.expedia.com/Tel-Aviv-Hotels-Royal-Beach-Tel-Aviv.h6235889.Hotel-Information?chkin=02%2F18%2F2016&chkout=02%2F26%2F2016&rm1=a2&hwrqCacheKey=ea3b1925-c997-4578-882c-eae78ccb2d80HWRQ1455021860237&c=90118bdc-60b0-420c-b4c0-232f875de565&\",
    \"price_for_currency\": 343,
    \"taxes_p_p\": 12,
    \"main_image\": \"https://images.trvl-media.com/hotels/7000000/6240000/6235900/6235889/6235889_13_l.jpg\"
  }
]";
}