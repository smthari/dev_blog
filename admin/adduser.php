<?php

// session started for admin to enable adding a new study feature only for admin
session_start();
if (isset($_SESSION['uid'])) {
    // in above code we checked session started or not using session id 
    /* echo $_SESSION['last']; */
} else {
    echo "error";
    header("location: login.php");
}

// 
if (isset($_POST['submitbtn'])) {
    include('../includes/db-connection.php');

    $userInput = $_POST['userInput'];
    $passwordInput = $_POST['passwordInput'];

    $FnameInput = $_POST['FnameInput'];
    $LnameInput = $_POST['LnameInput'];


    $profileInput = $_FILES['profileInput']['name'];
    $tempNameImg = $_FILES['profileInput']['tmp_name'];

    move_uploaded_file($tempNameImg, "../images/$profileInput");

    $qry = "INSERT INTO `user`(`id`, `username`, `password`, `First`, `Last`, `userProfile`) VALUES ('NULL','$userInput','$passwordInput', '$FnameInput', '$LnameInput', '$profileInput');";

    $stmt = $dbcon->query($qry);

    if ($stmt == true) {
        include("../components/toast.php");
?>
        <script>
            customToast("New user Added");
            // window.location.href = "/Admin-panel/Panel/admin/allusers.php"
        </script>

<?php
    } else {
        header("location:admin/adduser.php");
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Add new user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php
    include("../Components/topbar.php");
    include("../Components/sidebar.php");
    ?>
    <div class="wrapper">
        <div class="content-wrapper">

            <div class="content-header">

                <div class="container-fluid px-5">
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h5>Add new user</h5>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="allusers.php">All users</a></li>
                                <li class="breadcrumb-item active">Add user</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <main>
                <div class="container h-100 py-5">
                    <div class="row container m-auto py-5">
                        <div class=" col-md-12 col-lg-12 ">
                            <h4 class=" mb-3">Add New user</h4>
                            <form class="needs-validation" action="adduser.php" method="post" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Usename:</label>
                                        <input class="form-control" type="text" name="userInput" placeholder="Usename"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Password:</label>
                                        <input class="form-control" type="password" name="passwordInput" placeholder="Password"
                                            required>
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">First Name:</label>
                                        <input class="form-control" type="text" name="FnameInput" placeholder="First Name"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name:</label>
                                        <input class="form-control" type="text" name="LnameInput"
                                            placeholder="Last name" required>
                                    </div>
                                </div>


                                <div class="row g-3 pt-3">

                                    <div class="col-md-12">
                                        <label class="form-label">Profile Image: </label>
                                        <input class="form-control h-auto" type="file" name="profileInput"
                                            accept="image/png, image/gif, image/jpeg, image/jpg" required>
                                    </div>
                                </div>

                                <div class="row g-3 pt-3">
                                    <div class="col-md-12">
                                        <input class="w-100 btn btn-primary btn-lg" value="Add New user"
                                            type="submit" name="submitbtn" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <?php
    include("../Components/footer.php");
    ?>
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../assets/plugins/moment/moment.min.js"></script>
    <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../assets/dist/js/pages/dashboard.js"></script>
</body>

</html>