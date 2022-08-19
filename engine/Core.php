<?php
require "DatabaseConnector.php";

class Core
{
    private $database;
    private $browserName;
    private $operatingSystem;
    private $device;

//    function __construct() {
//
//    }

    function storeInDatabase($requestFrom, $ipAddress, $userAgent)
    {
        //Instantiate the database connected and create a connection to the database
        $database = new DatabaseConnector();

        if (!$database->checkConnection()) {
            die("Database not connected. Contact an admin");
        } else {
            $connection = $database->getConnection();

//            $request_from = $connection->real_escape_string();
//            $ip_address = $connection->real_escape_string();
//            $device = $connection->real_escape_string();
//            $platform = $connection->real_escape_string();
//            $browser = $connection->real_escape_string();
//
//            $query = "INSERT INTO redirects (request_from, ip_address, device, platform, software)" .
//                "VALUES ('{$request_from}', '{$ip_address}', '{$device}', '{$platform}', '{$browser}');";
//
//            if ($connection->query($query)) {
//                //if we are able to insert in the database, proceed to redirect
//                $this->redirect();
//            } else {
//                die ("<p>Something fatal occured: </p>" . $connection->error);
//            }
        }
    }

    function redirect()
    {
        /**
         * Redirect to the new location
         * For now, just make a simple Google search
         * Check APP config file to set the intended location
         */

        die(header("Location: https://www.google.com/search?q=pope nanal"));
    }


}
