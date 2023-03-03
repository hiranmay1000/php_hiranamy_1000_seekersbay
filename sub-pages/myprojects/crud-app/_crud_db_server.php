<?php

// Establish connection
$server = "db4free.net";
$username = "seekersbay_db";
$password = "!hgLg9JczNtu4_@";
$database = "demo4lifedb";


$connection = mysqli_connect($server, $username, $password, $database);

if (!$connection)
    die("Sorry couldn't connect to the server! <br> Error: " . mysqli_connect_errno());
else    


?>