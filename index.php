<?php
require "config/app.php";
require CORE;


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    print "<p>We just got a request</p>";

//    print_r($_SERVER);
//    redirect();
    storeInDatabase();
}
?>