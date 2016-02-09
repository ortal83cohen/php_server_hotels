<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */
class ControllerSearchHotels extends Controller implements RequestHolder
{
    private $request;

    public function setRequestParameters($place, $checkIn, $checkOut, $roomComposition, $priceRange)
    {
        $this->request = new Request($place, $checkIn, $checkOut, $roomComposition, $priceRange);
    }

    public function fetchWorkersData()
    {
        // call in parallel to the workers who return the data in unified json
        $query = $this->createRequest();
        $ch_1 = curl_init("$_SERVER[HTTP_REFERER]worker/" . Hotel::$HOTELS_EAN . "?$query");
        $ch_2 = curl_init("$_SERVER[HTTP_REFERER]worker/" . Hotel::$HOTELS_BOOKING . "?$query");
        curl_setopt($ch_1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch_2, CURLOPT_RETURNTRANSFER, true);

// build the multi-curl handle, adding both $ch
        $mh = curl_multi_init();
        curl_multi_add_handle($mh, $ch_1);
        curl_multi_add_handle($mh, $ch_2);

// execute all queries simultaneously, and continue when all are complete
        $running = null;
        do {
            curl_multi_exec($mh, $running);
        } while ($running);

//close the handles
        curl_multi_remove_handle($mh, $ch_1);
        curl_multi_remove_handle($mh, $ch_2);
        curl_multi_close($mh);

// all of our requests are done, we can now access the results
        $response_1 = curl_multi_getcontent($ch_1);
        $response_2 = curl_multi_getcontent($ch_2);

        $this->data = $this->aggregateData(json_decode($response_2), json_decode($response_1));
        $this->saveData(); // save the vendor site url by key: vendor-id

    }

    function createRequest()
    {
        return http_build_query(array('place' => $this->request->getPlace(), 'checkIn' => $this->request->getCheckIn(),
            'checkOut' => $this->request->getCheckOut(), 'roomComposition' => $this->request->getRoomComposition(), 'priceRange' => $this->request->getPriceRange()));
    }

    private function aggregateData()
    {
        //here there is need to map to the DB vendor-id to my id
        $result = array();
        foreach (func_get_args() as $array) {
            $result = array_merge($array, $result);
        }
        return $result;
    }

    private function saveData()
    {
        $redis = new Redis();
        $redis->saveHotels($this->data);
    }
}