<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!--  <li class="nav-item d-none d-sm-inline-block">
            <a href="/Admin-panel/Panel/index.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?php
            if (isset($_SESSION['uid'])) {
                echo '<a href="/admin-panel/panel/admin/account.php" class="nav-link" >Account</a>';
            } else {
                echo '<a href="/admin-panel/panel/register.php" class="nav-link" >Register</a>';
            }
            ?>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <?php
            if (isset($_SESSION['uid'])) {
                echo '<a href="/admin-panel/panel/logout.php" class="nav-link  ms-2" >Logout</a>';
            } else {
                echo '<a href="/admin-panel/panel/login.php" class="nav-link ms-2" >Sign In</a>';
            }
            ?>
        </li> -->


    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <li class="nav-item">

            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <div class="collapse navbar-collapse" id="navbar-list-4">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <img src="../images/<?php echo $_SESSION['profilPic']; ?>"
                                style="height: auto; width: 2vw;" class="rounded-circle "> -->
                            <?php
                            include('../includes/db-connection.php');

                            $qry = "SELECT * FROM admin WHERE id='$_SESSION[uid];'";
                            $stmt = $dbcon->query($qry);
                            $result = $stmt->fetch(PDO::FETCH_OBJ)
                            ?>

                            <!-- real time profile picture update  -->

                            <?php if ($_SESSION['role'] === 'admin') {
                            ?>
                                <img src="../images/<?php echo $result->adminProfile ? $result->adminProfile : "artist.png" ?>" style="height: auto; width: 2vw;"
                                    class="rounded-circle ">
                            <?php
                            } else {
                            ?>
                                <img src="../images/<?php echo $_SESSION["userProfile"] ?>" style="height: auto; width: 2vw;"
                                    class="rounded-circle ">
                            <?php
                            } ?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php if ($_SESSION['role'] === 'admin') {
                            ?>
                                <a class="dropdown-item" href="/dev-blog/admin/admin.php">Dashboard</a>
                            <?php
                            } else {
                            ?>
                                <a class="dropdown-item" href="/dev-blog/user/user.php">Dashboard</a>
                            <?php
                            } ?>
                            <?php if ($_SESSION['role'] === 'admin') {
                            ?>
                                <a class="dropdown-item" href="/dev-blog/admin/account.php">Edit Profile</a>
                            <?php
                            } else {
                            ?>
                                <a class="dropdown-item" href="/dev-blog/user/account.php">Edit Profile</a>
                            <?php
                            } ?>
                            <a class="dropdown-item" href="/dev-blog/logout.php">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->