<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Images/Logoes/h.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>
        document.addEventListener("touchmove", function (event) {
            event.preventDefault();
        })

        setInterval(() => {
            document.title = "Hiranmay's";
        }, 1500);
        setInterval(() => {
            document.title = "Portfolio website";
        }, 3000);

    </script>

    <title id="landingPage-title">Portfolio web</title>
</head>

<body id="section1">
    <?php require('user_auth_sys/login_signup.php') ?>

    <?php
    $showLoginModal = false;

    if (!isset($_SESSION['loggedin']) or $_SESSION['reg_cust_uname'] != true) {
        $showLoginModal = true;
    }

    ?>


    <?php require('partials/_sidebar.php') ?>
    <?php require('partials/_utility.php') ?>

    <!---------------------------- FULL-WEBPAGE --------------------------->
    <div id="full-webpage">




        <?php
        // Advance method to show feedback
        
        $username = isset($_SESSION['reg_cust_uname']) ? $_SESSION['reg_cust_uname'] : '';
        function showFeedback($type, $message)
        {
            $id = $type . '-feedback';
            $class = 'alert myalert';
            $icon = '';

            switch ($type) {
                case 'loggedin-success':
                    $icon = '✅';
                    $class .= ' alert-success';
                    break;
                case 'unmatched':
                case 'incorrect-comb':
                    $class .= ' alert-danger';
                    break;
                case 'not-avail':
                case 'new':
                    $icon = '❌';
                    $class .= ' alert-warning';
                    break;
                case 'logged-out':
                    $class .= ' alert-primary';
            }


            echo "
                <div id='$id' class='$class align-items-center my-0' role='alert'>
                    <div>
                        <strong>$icon $message</strong>
                    </div>
                </div>

                <script>
                    function hideFeedback(){
                        document.getElementById('$id').style.display = 'none';
                    }
                    setInterval(hideFeedback, 5000);
                </script>
                ";

        }

        $suggestForReg = "<script>
        setTimeout(function() {
                $('#signupModal').modal('show');
            }, 1000); // Change delay time (in milliseconds) as needed
        </script>";

        if ($isFound) {
            showFeedback('loggedin-success', "Welcome $username - You have been logged in successfully");
        } else if ($isReg) {
            showFeedback('loggedin-success', 'Your account has been created successfully and you are logged in');
        } else if ($isUnmatched) {
            showFeedback('unmatched', 'Your password does not match, check again!');
        } else if ($isNew) {
            showFeedback('new', 'No user found. Please create an account first');
            echo $suggestForReg;
        } else if ($isIncorrectComb) {
            showFeedback('incorrect-comb', 'Incorrect combination of username and password! Please check again');
        } else if ($isNotAvail) {
            showFeedback('not-avail', 'Sorry, this username is not available. Kindly choose a different username');
        } else if ($isloggedOut) {
            showFeedback('logged-out', 'Logout successful. See you again!');
        }

        ?>




        <?php
        // Another easy method to show feedback
        // Feedback message
        
        //         if ($isFound) {
//             $feedback = '
//         <div id="loggedin-success-feedback" class="alert alert-success align-items-center my-0" role="alert">
//             <div>
//                 <strong>Welcome [ ' . $_SESSION["reg_cust_uname"] . ' ] - You have been loggedin successully</strong>
//             </div>
//         </div>
//     ';
//         } else if ($isReg) {
//             $feedback = '
//         <div id="loggedin-success-feedback" class="alert alert-success align-items-center my-0" role="alert">
//             <div>
//                 <strong>Your account has been successully created ✅</strong>
//             </div>
//         </div>
//     ';
//         } else if ($isUnmatched) {
//             $feedback = '
//         <div id="loggedin-success-feedback" class="alert alert-danger align-items-center my-0" role="alert">
//             <div>
//                 <strong>Your password does not matched, check again!</strong>
//             </div>
//         </div>
//     ';
//         } else if ($isNew) {
//             $feedback = '
//         <div id="loggedin-success-feedback" class="alert alert-warning align-items-center my-0" role="alert">
//             <div>
//                 <strong>No user found. Please create an account first</strong>
//             </div>
//         </div>
//     ';
//         } else if ($isIncorrectComb) {
//             $feedback = '
//         <div id="loggedin-success-feedback" class="alert alert-warning align-items-center my-0" role="alert">
//             <div>
//                 <strong>Incorrect ❌ </strong> combination of <strong> username and password!</strong> please check again
//             </div>
//         </div>
//     ';
//         } else if ($isNotAvail) {
//             $feedback = '
//         <div id="loggedin-success-feedback" class="alert alert-warning align-items-center my-0" role="alert">
//             <div>
//                 Sorry <strong>this username is not available </strong>kindly choose different username ❌</div>
//         </div>
//     ';
//         } else if ($isloggedOut) {
//             $feedback = '
//         <div id="logout-success-feedback" class="alert alert-warning align-items-center my-0" role="alert">
//             <div>
//                 <strong>Logout</strong> successful. See you again!
//             </div>
//         </div>
//     ';
//         }
        
        //         echo $feedback . '
//     <script>
//         function hideFeedback(){
//             document.getElementById("loggedin-success-feedback").style.display = "none";
//         }
//         setInterval(hideFeedback, 5000);
//     </script>
// ';
        ?>








        <main>
            <!-- --------------------- PAGE-1 ----------------------------->
            <!-- HEADER -->
            <?php require('partials/_header_nav.php') ?>
            <!-- HEADER-END -->
            <div class="page1" id="section1">

                <section class="index-banner" id="index-banner">
                    <div class="myDottedFrotImg" id="myDottedFrotImg"></div>
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
                                    <h2><em>Welcome</em> <br> <em>to my portfolio website</em></h2>
                                </div>
                            </div>
                        </div>
                        <div class="title-2">
                            <p id="main-info-sugge">
                                Greetings and welcome
                            </p>
                            <div class="search-box">
                                <form action="https://www.google.com/search" method="get">
                                    <input type="search" name="q" class="search-input" placeholder="Search anything"
                                        spellcheck="true" data-ms-editor="true" /><input class="container-btn"
                                        type="submit" value="Google" /><i class='fas fa-search'></i>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!------------------------- PAGE-1-END------------------------->

            <!-- ------------------------PAGE-2-------------------------- -->
            <div class="page2">



                <section class="every-projects" id="section2">
                    <a class="project" id="project1" href="./sub-pages/myprojects/text-converter/index.html">
                        <h5 class="element-title">CHROME EXT</h5>
                    </a>
                    <a class="project" id="project2"
                        href="./sub-pages/myprojects/self-driving-car-simulation/index.html">
                        <h5 class="element-title">
                            SELF DRIVING SIMULATION
                        </h5>
                    </a>
                    <a class="project" id="project3" href="sub-pages/myprojects/crud-app/index.php">
                        <h5 class="element-title">
                            CRUD APP
                        </h5>
                    </a>
                    <a class="project" id="project4" href="./BlackJack_game/blackjack.php">
                        <h5 class="element-title">
                            BLACKJACK GAME
                        </h5>
                    </a>
                    <a class="project" id="project5" href="achivement-page  page-template">
                        <h5 class="element-title">
                            ACHEIVEMENTS
                        </h5>
                    </a>
                    <a class="project" id="all-projects" id="see-all" href="./sub-pages/projects.php">
                        <h5 class="element-title">
                            <em>SEE ALL</em>
                        </h5>
                    </a>

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
                            To see my latest projects and updates please visit<a id="projects-html-page"
                                href="./Projects-page/projects.php">project</a>section and also check out my latest<a
                                href="blogs">blogs</a>. Feel free to explore and get in touch if you have any questions
                            or opportunities to collaborate. Let's build something great together!
                        </p>
                        <br />
                        <p>
                            To know more please visit
                            <span style="background-color: lightblue"><a href="./sub-pages/aboutme.php"
                                    style="text-decoration: underline">about me</a></span>
                            section
                        </p>
                        <p>For more queries<a href="/sub-pages/contact.php">contact me</a>.</p>
                        <br />
                        <p id="github-code-link">
                            <a href="https://github.com/hiranmay1000/personal_portfolio_php_web" target="_blank">Code
                                for this website<img class="hyperlink-logo" src="./Images/Logoes/hyperlink.png"
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