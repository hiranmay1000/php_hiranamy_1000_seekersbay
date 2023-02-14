<?php require('user_auth_sys/signup.php') ?>
<?php require('user_auth_sys/login.php') ?>

<?php

if (!isset($_SESSION['loggedin']) or $_SESSION['reg_cust_uname'] !== true) {
    // header('location: \myprojects\php-v-hiranmay1000\php_hiranamy_1000_seekersbay\partials\_header_nav.php');
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="./Images/Logoes/h.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <script>
        document.addEventListener("touchmove", function (event) {
            event.preventDefault();
        })
    </script>

    <title>Hiranmay's web</title>
</head>

<body id="section1">


    <?php require('partials/_sidebar.php') ?>
    <?php require('partials/_utility.php') ?>

    <!---------------------------- FULL-WEBPAGE --------------------------->
    <div id="full-webpage">






        <?php





        // Feedback message
        

        if ($isFound) {
            echo '
        <div id="loggedin-success-feedback" class="alert alert-success align-items-center my-0" role="alert">
            <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg> -->
            <div>
                <strong>Welcome [ ' . $_SESSION["reg_cust_uname"] . ' ] - You have been loggedin successully</strong>
            </div>
        </div>


        <script>
            function hideFeedback(){
                document.getElementById("loggedin-success-feedback").style.display = "none";
            }setInterval("hideFeedback()", 5000);
        </script>


';
        } else if ($isReg) {
            echo '

        <div id="loggedin-success-feedback" class="alert alert-success align-items-center my-0" role="alert">
            <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg> -->
            <div>
                <strong>Your account has been successully created ✅</strong>
            </div>
        </div>


        <script>
            function hideFeedback(){
                document.getElementById("loggedin-success-feedback").style.display = "none";
            }setInterval("hideFeedback()", 5000);
        </script>


';
        } else if ($isUnmatched) {
            echo '

        <div id="loggedin-success-feedback" class="alert alert-danger align-items-center my-0" role="alert">
            <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg> -->
            <div>
                <strong>Your password does not matched, check again!</strong>
            </div>
        </div>


        <script>
            function hideFeedback(){
                document.getElementById("loggedin-success-feedback").style.display = "none";
            }setInterval("hideFeedback()", 5000);
        </script>


';
        } else if ($isNew) {
            echo '

        <div id="loggedin-success-feedback" class="alert alert-warning align-items-center my-0" role="alert">
            <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg> -->
            <div>
                <strong>No user found. Please create an account first</strong>
            </div>
        </div>



        <script>
            function hideFeedback(){
                document.getElementById("loggedin-success-feedback").style.display = "none";
            }setInterval("hideFeedback()", 5000);
        </script>


';
        } else if ($isIncorrectComb) {
            echo '

    <div id="loggedin-success-feedback" class="alert alert-warning align-items-center my-0" role="alert">
        <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg> -->
        <div>
            <strong>Incorrect ❌ </strong> combination of <strong> username and password!</strong> please check again
        </div>
    </div>


    <script>
        function hideFeedback(){
            document.getElementById("loggedin-success-feedback").style.display = "none";
        }setInterval("hideFeedback()", 5000);
    </script>


';
        } else if ($isNotAvail) {
            echo '

    <div id="loggedin-success-feedback" class="alert alert-warning align-items-center my-0" role="alert">
        <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg> -->
        <div>
            Sorry <strong>this username is not available </strong>kindly choose different username ❌</div>
    </div>


    <script>
        function hideFeedback(){
            document.getElementById("loggedin-success-feedback").style.display = "none";
        }setInterval("hideFeedback()", 5000);
    </script>


';
        } else

            if ($isloggedOut) {
                echo '
        
                    <div id="logout-success-feedback" class="alert alert-warning align-items-center my-0" role="alert">
                    <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg> -->
                    <div>
                        <strong>Logout</strong> successful. See you again!
                    </div>
                    </div>
                    
                    
                    <script>
                    function hideFeedback(){
                        document.getElementById("logout-success-feedback").style.display = "none";
                    }setInterval("hideFeedback()", 5000);
                    </script>
                ';
            }
            
    ?>






        <main>
            <!-- --------------------- PAGE-1 ----------------------------->
            <div class="page1" id="section1">
                <!-- HEADER -->
                <?php require('partials/_header_nav.php') ?>
                <!-- HEADER-END -->

                <section class="index-banner" id="index-banner">
                    <div class="r_box">
                        <?php require('partials/_show_date_time.php') ?>
                    </div>
                    <div class="vertical-center">
                        <div class="title-3">
                            <div class="welcome">
                                <h4>
                                    <span id="hello" style="color: #e85848"></span>
                                </h4>
                            </div>
                        </div>

                        <div class="border-title">
                            <div class="title-inside-box">
                                <div class="title">
                                    <h2>I'm a<br />software Engineer</h2>
                                </div>
                            </div>
                        </div>
                        <div class="title-2">
                            <p id="main-info-sugge">
                                Greetings and welcome <br />
                                Welcome to my online portfolio
                        </div>
                        <div class="search-box">
                            <form action="https://www.google.com/search" method="get">
                                <input type="search" name="q" class="search-input" placeholder="Search anything"
                                    spellcheck="true" data-ms-editor="true" /><input class="container-btn" type="submit"
                                    value="Google" /><i class='fas fa-search'></i>
                            </form>
                        </div>
                        </p>
                    </div>
                </section>
            </div>
            <!------------------------- PAGE-1-END------------------------->

            <!-- ------------------------PAGE-2-------------------------- -->
            <div class="page2">
                <section class="all-elements" id="section2">
                    <div class="all-elements-box">
                        <div class="element-container">
                            <div class="element-sq">
                                <a href="">
                                    <h3 class="element-title">
                                        CHROME EXT
                                    </h3>
                                </a>
                            </div>
                            <div class="element-rec">
                                <a href="./self-driving-car-simulation/index.php">
                                    <h3 class="element-title">
                                        SELF DRIVING SIMULATION
                                    </h3>
                                </a>
                            </div>
                            <div class="element-sq">
                                <a href="./personality-api/personality-api.php">
                                    <h3 class="element-title">
                                        PERSONALITY API
                                    </h3>
                                </a>
                            </div>
                            <div class="element-rec">
                                <a href="./BlackJack_game/blackjack.php">
                                    <h3 class="element-title">
                                        BLACKJACK GAME
                                    </h3>
                                </a>
                            </div>
                            <div class="element-sq">
                                <a href="achivement-page  page-template">
                                    <h3 class="element-title">
                                        ACHEIVEMENTS
                                    </h3>
                                </a>
                            </div>
                            <div class="element-sq">
                                <a id="see-all" href="./sub-pages/projects.php">
                                    <h3 class="element-title">
                                        <em>SEE ALL</em>
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="wrapper-paeg2">
                    <h3>Greetings and welcome</h3>
                    <p>Welcome to my online portfolio! As a beginner software engineer, I'm thrilled to share with you
                        my passion for coding, my expertise in developing cutting-edge technologies, and my commitment
                        to delivering high-quality results. Here, you'll have a chance to learn about my past
                        experiences, see examples of my work, and understand what sets me apart in a crowded field. So,
                        take a look around, get inspired, and let's connect if you're ready to take your projects to the
                        next level.</br> Thank you for visiting!"</p>
                </div>
            </div>
            <!------------------------ PAGE-2-END ------------------------->

            <!-------------------------- PAGE-3 --------------------------->
            <div class="page3">
                <section class="index-banner-2" id="section3">
                    <div class="vertical-center">
                        <div class="my-info-blury-container">
                            <div class="title-software">
                                <h2>
                                    I'M A <br />SOFTWARE
                                    <span class="input" style="color: orange"></span>
                                </h2>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!------------------------- PAGE-3-END ------------------------>

            <!--------------------------- PAGE-4 -------------------------->
            <div class="page4">
                <section class="previews" id="section4">
                    <div class="vertical-center">
                        <h3>Creations</h3>
                        <p>
                            To see my latest projects and updates please
                            visit
                            <a id="projects-html-page" href="./Projects-page/projects.php">project
                            </a>
                            section and also check out my latest
                            <a href="blogs">blogs</a>. Feel free to explore and get in touch if you have any questions
                            or opportunities to collaborate. Let's build something great together!
                        </p>
                        <br />
                        <p>
                            To know more please visit
                            <span style="background-color: lightblue"><a href="./sub-pages/aboutme.php"
                                    style="text-decoration: underline">about me</a></span>
                            section
                        </p>
                        <br />
                        <p>
                            For more queries
                            <a href="/sub-pages/contact.php">
                                contact me</a>
                            .
                        </p>

                        <br />
                        <p id="github-code-link">
                            <a href="https://github.com/hiranmay1000/personal-web" target="_blank">Code for this website
                                <img class="hyperlink-logo" src="./Images/Logoes/hyperlink.png"
                                    alt="hyperlink logo" /></a>
                        </p>
                    </div>
                </section>
            </div>
            <!------------------------ PAGE-4-END ------------------------->



            <!------------------------ NEWSLETTER ------------------------->
            <?php require('partials/_subscription.php') ?>
            <!------------------------ NEWSLETTER-END ------------------------->



        </main>
        <?php require('partials/_footer_blue.php') ?>
    </div>
    <!--__________________________ FULL-WEBPAGE-THE_END____________________________-->



    <!-- ..............JAVASCRIPT............... -->
    <?php require('partials/_javascript_library_essentials.php') ?>
    <?php require('partials/_hello_world_typed.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <script src="main.js"></script>
    <!-- .............JAVASCRIP-END............... -->
</body>

</html>