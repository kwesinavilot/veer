<?php
/**
 * Custom function to handle errors which sets how erros will be handled
 * errorNumber is the error number as assigned by PHP such as 2 which represents E_WARNING
 * errorMessage is the error message from PHP
 * errorFile is the name of the file in which the error occured
 * errorLine is the line on which the error occured in the file
 * errorVariables is an array of every variable that existed when the error occured (REMOVED FOR THE MOMENT)
 * , $errorVariables
 */
function errorHandler($errorNumber, $errorMessage, $errorFile, $errorLine) {
    global $debug, $errors_email;

    //Build the error message
    $message = "An error occured in script '$errorFile' on line '$errorLine':\n<br />$errorMessage\n<br/>";

    //Add the date and time of occurrence
    $message .= "Date/Time: " . date('n-j-Y H:i:s') . "\n<br />";

    //Append $errorVariables to the $message
    //$message .= "<pre>" . print_r($errorVariables, 1) . "</pre>\n<br />";

    //Add everything that happened before the error.
    //$message .= "<pre>" . print_r(debug_backtrace(), 1) . "</pre>\n";

    //If the site is not live, show the errors in the browser
    if ($debug) {
        //nl2br turns newlines to break tags
        echo "<div style='color:red;'>" . nl2br($message) . "</div>";
    } else {
        /**
         * If the site is live,
         * $message is all the error message
         * The second argument; 1 means send an email. The default of 0 would send a message to the OS's log
         * The third is the destination of the message. With an email, it turns it into a 'To:'
         * The last one adds additional headers to the email such as 'From:'
         */
        error_log($message, 1, $errors_email, 'From: errormanager@dwadipa.com');

        //After sending the mail, show a generic message to the user
        if (($errorNumber != E_NOTICE) && ($errorNumber < 2048)) {
            echo '<div class="error">A system error occured. We apologize for the inconvenience.</div>';
        }
    }
}

//Set the site's error handler to the custom error handler
set_error_handler('errorHandler');
?>