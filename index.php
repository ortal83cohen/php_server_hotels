<?php
/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */


// Kickstart the framework
$f3 = require(__DIR__ . '/fatfree/lib/base.php');
$f3->set('AUTOLOAD', 'model/; controller/; view/; db/; worker/');


// Load configuration
$f3->config('config.ini');

//define router
$f3->route('GET /',
    function () {
        $controller = new ControllerHome();
        $controller->render();
    }
);;

$f3->route('GET /search/hotels',
    function () {
        $controller = new ControllerSearchHotels();
        $controller->setRequestParameters($_GET['place'], $_GET['checkIn'],
            $_GET['checkOut'], $_GET['roomComposition'], $_GET['priceRange']);
        $controller->fetchWorkersData();
        $controller->render();
    }
);
$f3->route('GET /worker/' . Hotel::$HOTELS_EAN,
    function () {
        $worker = new WorkerHotelsEan();
        $worker->setRequestParameters($_GET['place'], $_GET['checkIn'],
            $_GET['checkOut'], $_GET['roomComposition'], $_GET['priceRange']);
        $worker->fetchVendorData();
        $worker->render();
    }
);
$f3->route('GET /worker/' . Hotel::$HOTELS_BOOKING,
    function () {
        $worker = new WorkerHotelsBooking();
        $worker->setRequestParameters($_GET['place'], $_GET['checkIn'],
            $_GET['checkOut'], $_GET['roomComposition'], $_GET['priceRange']);
        $worker->fetchVendorData();
        $worker->render();
    }
);
$f3->route('GET /redirect/hotel/@vendor/@id',
    function ($f3) {
        $controller = new ControllerHotelRedirect();
        $controller->setVendor($f3->get('PARAMS.vendor'));
        $controller->setId($f3->get('PARAMS.id'));
        $controller->trackRedirect();
        $controller->render();
    }
);

$f3->run();
