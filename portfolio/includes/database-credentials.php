<?php
// Connect to database
$database = "dhowardg_grc";
$username = "dhowardg_grcuser";
$password = "newuser12345";
$hostname = "localhost";

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("There was a problem connecting to the database...");