<?php


$server = "db4free.net";
$db_username = "seekersbay_db";
$db_password = "!hgLg9JczNtu4_@";
$db_name = "demo4lifedb";

$conn = mysqli_connect($server, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Could not connect to database due to " . $conn->error);
}



?>