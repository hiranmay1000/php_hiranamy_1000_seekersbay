<?php

$isloggedOut = false;
if (isset($_GET['logout'])) {
    // Clear the session variables

    $isloggedOut = true;
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user back to the login page
    header('Location: login.php');
    exit;
}

?>