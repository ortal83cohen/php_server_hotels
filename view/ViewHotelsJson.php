<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/8/2016
 */
class ViewHotelsJson extends ViewHotels
{
    public function display()
    {

        echo json_encode($this->data);
    }

}