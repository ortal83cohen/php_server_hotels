<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/8/2016
 */
class Request
{
    private $place;
    private $checkIn;
    private $checkOut;
    private $roomComposition;
    private $priceRange;

    /**
     * Request constructor.
     * @param $place
     * @param $checkIn
     * @param $checkOut
     * @param $roomComposition
     * @param $priceRange
     */
    public function __construct($place, $checkIn, $checkOut, $roomComposition, $priceRange)
    {
        $this->place = $place;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->roomComposition = $roomComposition;
        $this->priceRange = $priceRange;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return mixed
     */
    public function getCheckIn()
    {
        return $this->checkIn;
    }

    /**
     * @param mixed $checkIn
     */
    public function setCheckIn($checkIn)
    {
        $this->checkIn = $checkIn;
    }

    /**
     * @return mixed
     */
    public function getCheckOut()
    {
        return $this->checkOut;
    }

    /**
     * @param mixed $checkOut
     */
    public function setCheckOut($checkOut)
    {
        $this->checkOut = $checkOut;
    }

    /**
     * @return mixed
     */
    public function getRoomComposition()
    {
        return $this->roomComposition;
    }

    /**
     * @param mixed $roomComposition
     */
    public function setRoomComposition($roomComposition)
    {
        $this->roomComposition = $roomComposition;
    }

    /**
     * @return mixed
     */
    public function getPriceRange()
    {
        return $this->priceRange;
    }

    /**
     * @param mixed $priceRange
     */
    public function setPriceRange($priceRange)
    {
        $this->priceRange = $priceRange;
    }

}