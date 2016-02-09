<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */
abstract class WorkerHotels
{
    protected $data = array();

    public function render()
    {
        $view = new ViewHotelsJson($this->data);
        $view->display();
    }

    public function fetchVendorData()
    {
        $this->data;
    }


}