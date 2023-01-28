<?php

    // sql = Structured Query Language
    echo "welcome to database";
    // INSERT INTO `seekersbay_subscribers` (`slno`, `email`, `date`) VALUES (NULL, 'vikash@gmail.com', CURRENT_TIMESTAMP);
    // http://localhost/myprojects/php%20file%20hiranmay1000/php_hiranamy_1000_seekersbay/sql_server.php
    
    // connect
    // MySQLi ext.
    
    $servername = "demo4lifedb";
    $username = "seekersbay_db";
    $password = "!hgLg9JczNtu4_@";

    // create a connection object
    $conn = mysqli_connect($servername, $password, $password);

    echo "Connected succesfully";


    // PDO - PHP Data Objects


?>
