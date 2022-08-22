<?php
/**
 * This configuration file contains app-wide settings and does the following:
 * - Has app-wide settings in one file
 * - Stores URLs and URIs as constants
 */

//Set the path to the MySQL configuration file also as a constant
const CORE = 'engine/Core.php';

//Set path to the Dwadipa Core
const ENGINE = 'engine/';

const REDIRECT_TO = "https://www.dwadipa.com";

//Email address to which errors are sent
$errors_email = "teamserviceskeep@gmail.com";

//Email address for customer services and contacts
$contact_email = "";

//The environment we're running on now
$environment = "";

//Determine whether we're running on a local server or a live server
if (stristr($_SERVER['HTTP_HOST'], 'local') || (substr($_SERVER['HTTP_HOST'], 0, 7) == '192.168')) {
    //die("We're running on a local server");
    $environment = "local";
} else {
    //die("We're running on a live server");
    $environment = "production";
}

//Determine the location of files and site URL based on the server we are running on
if ($environment == "local") {
    //Let's debug while offline
    $debug = TRUE;

    //Set the base url of the application
    define('BASE_URL', 'http://localhost/veer/');
} else {
    //Set the base url of the application
    define('BASE_URL', 'http://www.dwadipa.com/');
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

//get error configuration
require "config/errors.php";

/**
 * If you need session functionality, then uncomment below
 * to enable it.
 */
//Set the session name to Veer
//session_name('veer_redirect');

//Start the session
//session_start();
?>