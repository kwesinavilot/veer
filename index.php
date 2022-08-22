<?php
require "config/app.php";
require "engine/UserAgentDetective.php";
require CORE;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    print "<p><strong>Redirecting you...</strong></p>";

    $userAgent = new UserAgentDetective();
    $userAgent = $userAgent->detect();
//    die(print_r($userAgent));

    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $requestFrom = isset($_GET['from']) ?: "Unknown";

    $core = new Core();
    $core->storeInDatabase($requestFrom, $ipAddress, $userAgent);
}
?>