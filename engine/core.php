<?php
require "config/DatabaseConnector.php";

function storeInDatabase() {
    //Instantiate the database connected and create a connection to the database
    $database = new DatabaseConnector();
    $database->createConnection();

    if($database->checkConnection() == false){
        die("Database not connected. Contact an admin");
    } else {
        $connection = $database->getConnection();

        $request_from = $connection->real_escape_string();
        $ip_address = $connection->real_escape_string();
        $device = $connection->real_escape_string();
        $platform = $connection->real_escape_string();
        $browser = $connection->real_escape_string();

        $query = "INSERT INTO redirects (request_from, ip_address, device, platform, software)".
                    "VALUES ('{$request_from}', '{$ip_address}', '{$device}', '{$platform}', '{$browser}');";

        if($connection->query($query)) {
            //if we are able to insert in the database, proceed to redirect
            redirect();
        } else {
            die ("<p>Something fatal occured: </p>" . $connection->error);
        }
    }
}

function redirect() {
    /**Redirect to the new location
     * For now, just make a simple Google search
     */

    die(header("Location: https://www.google.com/search?q=pope nanal"));
}
