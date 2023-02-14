<?php

$isReg = false;
$isUnmatched = false;
$isFound = false;
$isNew = false;
$isIncorrectComb = false;
$isNotAvail = false;
$isloggedOut = false;

// Establish connnection
require('user_auth_sys/db_conn.php');


if (isset($_POST['user_signup'])) {

    $cust_uname = $_POST['cust_uname'];
    $cust_pass = $_POST['cust_pass'];
    $cust_cpass = $_POST['cust_cpass'];


    if ($cust_pass === $cust_cpass) {
        $sql1 = "SELECT * FROM `sb_ac` WHERE `uname` = '$cust_uname'";
        $res1 = $conn->query($sql1);

        $row = mysqli_fetch_assoc($res1);
        if (is_array($row) === false) {

            $hash = password_hash($cust_pass, PASSWORD_ARGON2I);
            $sql = "INSERT INTO `sb_ac` (`uname`, `upass`, `date`) VALUES ('$cust_uname', '$hash', current_timestamp())";
            $res = $conn->query($sql);

            if (!$res) {
                echo "Something went wrong! ->" . mysqli_errno($conn);
            } else {
                $isReg = true;
            }
        } else {
            $isNotAvail = true;
        }
    } else {
        $isUnmatched = true;
    }









} else if (isset($_POST['user_login'])) {
    $reg_cust_uname = $_POST['reg_cust_uname'];
    $reg_cust_pass = $_POST['reg_cust_pass'];

    $sql = "SELECT * FROM `sb_ac` WHERE `uname` = '$reg_cust_uname'";
    $res = $conn->query($sql);

    $num = mysqli_num_rows($res);

    if ($num === 1) {
        $row = mysqli_fetch_assoc($res);
        if (password_verify($reg_cust_pass, $row['upass'])) {
            $isFound = true;

            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['reg_cust_uname'] = $reg_cust_uname;
            if (isset($_POST['saveme'])) {
                setcookie('username', $reg_cust_uname, time() + 3600 * 24 * 30);
            }
        } else {
            $isIncorrectComb = true;
        }

    } else {
        $isNew = true;
    }

}







?>


<div class="modal fade" id="loginModal" aria-hidden="true" aria-labelledby="loginModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: #cacaca">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="loginModalLabel">Hey there!</h1>
                <button type="button" class="btn btn-secondary btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin:0"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="cust_username" class="form-label">Username</label>
                        <input type="username" class="form-control" id="cust_username" name="reg_cust_uname"
                            aria-describedby="emailHelp" placeholder="Email / username">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reg_cust_pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="reg_cust_pass" name="reg_cust_pass">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="saveme" name="saveme" style="float:left">
                        <label class="form-check-label" for="saveme">Remember
                            me</label>
                    </div>

                    <p id="" class="form-text">New user registration <a data-bs-toggle="modal" href="#signupModal"
                            role="button">signup</a> now</p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="user_login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="logoutModal" aria-hidden="true" aria-labelledby="logoutModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: #cacaca">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="logoutModalLabel">Are you sure!</h1>
                <button type="button" class="btn btn-secondary btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin:0"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <p>Register New User</p>
                        <a class="btn btn-secondary" data-bs-toggle="modal" href="#signupModal" role="button">Signup</a>
                    </div>
                    <div class="mb-3">
                        <p>Login to different accout</p>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#loginModal" role="button">Login</a>
                    </div>

                    <p id="" class="form-text">Are you sure you want to <a href="index.php?logout=1"
                            role="button">logout</a>?</p>
                    <div class="modal-footer">
                        <a class="btn btn-danger btn-primary" href="index.php?logout=1" role="button">Logout</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>