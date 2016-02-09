<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */
class ControllerHotelRedirect extends Controller
{
    private $id;
    private $vendor;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }

    public function trackRedirect()
    {
        // save clicks count on the DB
        $db = new MySql();
        $db->insertClick($this->id, $this->vendor);
    }

    public function render()
    {
        $redis = new Redis(); //to save another call to the vendor API, we can find the url in tmp cache like redis
        $url = $redis->getHotelOriginalUrl($this->vendor, $this->id);

        // redirect to the vendor site
        header("Location: $url");
        die();
    }

}