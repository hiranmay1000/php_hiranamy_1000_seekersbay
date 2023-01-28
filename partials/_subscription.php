<?php // For email

$isSub = false;
$isSubmit = false;

if(isset($_POST['user_subs'])){

    $server = "db4free.net";
    $uname = "seekersbay_db";
    $pass = "!hgLg9JczNtu4_@";
    $dbname = "demo4lifedb";

    // establish connection with database
    $connection = mysqli_connect($server, $uname, $pass, $dbname);

    if(!$connection){
        die("connection to this database failed due to " . mysqli_connect_error());
    }   

    $email = $_POST['email'];

    $sql = "INSERT INTO `demo4lifedb`.`seekersbay_subscribers` (`email`, `date`) VALUES ('$email', current_timestamp())";


    if($connection->query($sql) == true){
        $isSub = true;
    }else{
        echo "<br>Connection error!";
    }

    // disable connection
    $connection->close();

}else if(isset($_POST['user_contrib_req'])){ // For message

    $server = "www.db4free.net";
    $username = "seekersbay_db";
    $password = "!hgLg9JczNtu4_@";
    $dbname = "demo4lifedb";

    // establish connection using MySQLi ext
    $connection = mysqli_connect($server, $username, $password, $dbname);

    if(!$connection){
        die("Not connected due to " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $user_mess = $_POST['user_mess'];

    $sql_for_user_mess = "INSERT `demo4lifedb` . `user_collab` (`name`, `mess`, `date`) VALUE ('$name', '$user_mess', current_timestamp())";

    if($connection->query($sql_for_user_mess)){
        $isSubmit = true;
    } else
        echo "Not submitted your response";

    // close 
    $connection->close();
}
?>

<div class="section-container" id="newsletter_section">
    <section class="page4-newsl">
        <div class="message-page page-height">
            <h4>WANT TO CONTRIBUTE? LEAVE A MESSAGE</h4>
            <form action="#newsletter_section" method="post">
                <div class="message-container">
                    <input type="text" name="name" id="name-box" placeholder="Name *" required>
                    <input type="text" name="user_mess"id="mess-box" placeholder="Your Message" required>
                    <div class="collab-btns">
                        <input type="submit" value="SEND" class="submit-btn submit-btn-mess" name="user_contrib_req">
                        <input type="reset" value="RESET" class="reset-btn" style="background:pink">
                    </div>
                    <?php if($isSubmit == true){
                        echo "<div> <p id='dis_collab_mess' style='color: lightgreen; font-size:17px; text-align: center;'>Your response has been recorded!<br>Thanks!</p></div>";
                    }?>
                </div>
            </form>
        </div>
    </section>

    <section class="page5">
        <div class="subscribe subscribe-page page-height">
            <form action="#newsletter_section" method="post">
                <div class="subscribe-details-container">
                    <h4 class="page-heading subscribe-heading">SUBSCRIBE TO MY NEWSLETTER</h4>
                    <input type="email" name="email" id="email-box" placeholder="Email *" required>
                    <input type="submit" value="SUBSCRIBE" class="submit-btn" name="user_subs">
                    <?php if($isSub == true){
                        echo "<div> <p id='dis_sub_mess' style='color: lightgreen; font-size:17px; '>Thanks for subscribing</p></div>";
                    }?>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    const sub_feedback = document.getElementById("dis_sub_mess");
    const collab_feedback = document.getElementById("dis_collab_mess");

    function showSubsText(){
        sub_feedback.style.visibility = "hidden";
    }setTimeout("showSubsText()", 5000);

    function showCollabText(){
        collab_feedback.style.visibility = "hidden";
    }setTimeout("showCollabText()", 5000);

</script>