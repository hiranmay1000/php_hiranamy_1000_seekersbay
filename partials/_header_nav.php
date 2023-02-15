<header id="navbar" class="navbar-main">

    <a id="show-sidebar" class="btn btn-sm" href="#">
        <i id="bar_container" class="fas fa-bars"></i>
    </a>


    <div class="logo-container">
        <div id="logo">
            <a href="index.php" style=" text-decoration:none;">HIRAN<span style="color: #e63946;">MAY</span></a>
        </div>
    </div>

    <div class="menu-container">
        <nav class="nav-menu">
            <ul  id="nav-menu-ele">
                <a href="../index.php">Home</a>
                <a href="shorturl.at/mpLNQ">Resume</a>
                <a href="./sub-pages/aboutme.php">About me</a>
                <a href="./sub-pages/projects.php">Projetcs</a>
                <a href="">Blog</a>
            </ul>
        </nav>
    </div>






    <div class="login-container" id="login-container-l" style="display:flex">
        <?php
        if (!isset($_SESSION['loggedin']) or $_SESSION['reg_cust_uname'] != true) {
            echo '<a class="btn btn-primary" data-bs-toggle="modal" href="#loginModal" role="button">Login</a>';
        } else {
            echo '<a class="btn btn-danger btn-primary" data-bs-toggle="modal" href="#logoutModal" role="button">Logout</a>';
        }
        ?>
    </div>

    <div class="login-container" id="login-container-sm" style="display:none">
        <?php
        if (!isset($_SESSION['loggedin']) or $_SESSION['reg_cust_uname'] != true) {
            echo '<a class="btn btn-sm btn-primary" data-bs-toggle="modal" href="#loginModal" role="button">Login</a>';
        } else {
            echo '<a class="btn btn-sm btn-danger btn-primary" data-bs-toggle="modal" href="#logoutModal" role="button">Logout</a>';
        }
        ?>
    </div>

</header>


<!-- <div class="sidebar_menu">
    <div class="bars_corner">
        <a id="show-sidebar" class="btn btn-sm" href="#">
            <i id="bar_container" class="fas fa-bars"></i>
        </a>
    </div>
</div> -->