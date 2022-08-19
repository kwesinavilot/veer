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
    die($userAgent->detect());
//    die(print_r($core->getUserAgentDetails()));
}
?>