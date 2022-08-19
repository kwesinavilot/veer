<?php
require "config/app.php";
require "engine/UserAgentDetective.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    print "<p>We just got a request</p>";

//    print_r($_SERVER);
//    redirect();
//    $core = new Core();
    //$core->storeInDatabase();

    $userAgent = new UserAgentDetective();
    $userAgent = $userAgent->detect();
//    die(print_r($userAgent));

    $ipAddress = $_SERVER['REMOTE_ADDR'];
//    $requestFrom = $_SERVER['HTTP_REFERER'];
    die(print_r($_SERVER));

    $core = new Core();
    $core->storeInDatabase($userAgent);
}
?>