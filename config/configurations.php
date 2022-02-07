<?php 
    /**
     * This configuration file contains app-wide settings and does the following:
     * - Has app-wide settings in one file
     * - Stores URLs and URIs as constants
    */

    //Email address to which errors are sent
    $errors_email = "teamserviceskeep@gmail.com";

    //Email address for customer services and contacts
    $contact_email = "";

    //Determine whether we're running on a local server or a live server
    if (stristr($_SERVER['HTTP_HOST'], 'local') || (substr($_SERVER['HTTP_HOST'], 0, 7) == '192.168')) {
        //die("We're running on a local server");
        $local = TRUE;
    } else {
        //die("We're running on a live server");
        $local = FALSE;
    }

    //Determine the location of files and site URL based on the server we are running on
    if ($local) {
        //Let's debug while offline
        $debug = TRUE;

        //Set the base url of the application
        define('BASE_URL', 'http://localhost/Veer/');

        //Set the path to the MySQL configuration file also as a constant
        define('MYSQL', 'config/DatabaseConnector.php');

        //Set path to the Dwadipa Core
        define('ENGINE', '../engine/');
        
    } else {
        //Set the base url of the application
        define('BASE_URL', 'http://www.dwadipa.com/');

        //Set the path to the MySQL configuration file also as a constant
        define('MYSQL', '/engine/DatabaseConnector.php');

        //Set path to the Dwadipa Core
        define('ENGINE', '../engine/');
    }

    /**
     * This is the most important setting!!!!
     * The $debug is used for error management
     * To debug a specific page, add this to the index.php page
     */
    //To debug the entire site regardless of environment, do:
    //$debug = TRUE;

    //In the case that debugging isn't set or assuming debugging is off,
    //use this failsafe to put off debugging
    if (!isset($debug)) {
        $debug = FALSE;
    }

    //Set the session name to Veer
    session_name('Veer_redirect');

    //get error configuration
    require "config/errors.php";

    //Start the session
    session_start();
?>