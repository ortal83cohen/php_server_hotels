<a></a>
<?php

/**
 * Created by PhpStorm.
 * User: ortal
 * Date: 2/7/2016
 */
class ViewHotelsHome extends ViewHotels
{

    public function display()
    {

        echo "<br><br>";

        echo "


<form action=\"search/hotels\" method=\"po\">
  Place:<br>
  <input type=\"text\" name=\"place\" value=\"Tel Aviv\">
  <br>
  Check In:<br>
  <input type=\"text\" name=\"checkIn\" value=\"15/01/2015\">
  <br>
   Check Out:<br>
  <input type=\"text\" name=\"checkOut\" value=\"16/01/2015\">
  <br>
   Room composition:<br>
  <input type=\"text\" name=\"roomComposition\" value=\"1\">
  <br>
   Price range:<br>
  <input type=\"text\" name=\"priceRange\" value=\"100-1000\">
  <br>
  <br><br>
  <input type=\"submit\" value=\"Submit\">
</form>


<h3>Explanations</h3>
<ul>
  <li>You can see the code source at - <a href='https://github.com/ortal83cohen/php_server_hotels'>Github</a></li>
  <li>The app is designed as rest api - this page is only for reference</li>
  <li>I choose to use fatfree framework for this code challenge for the router and mysql connection to save time.</li>
  <li>I created a small MVC framework. frameworks that i know are too overhead for this small project.</li>
  <li>I skipped important issues do to lack of time as : input validation, sql injection check, cache in a few places(worker,results...),DAL(data abstraction layer) for the DB and the APIs, and more </li>
  <li>I created a controller that call (in multi_curl) to the workers that responsive on retrieve the data from the vendor, normalize the data as i want it and return it in one format</li>
  <li>I tried to open account in ean with no success, and I don't have example data for search hotels, so I created simple mock. </li>
</ul>
";
    }

}
