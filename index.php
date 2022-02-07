<?php
require "config/configurations.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    print "<p>We just got a request</p>";
}
?>