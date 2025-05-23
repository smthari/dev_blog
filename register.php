<?php

// session started to prevent re-register after navigating throughout the website 
// session started at the head of register form to check if there already a user signed then redirect to user page
session_start();
if (isset($_SESSION['uid'])) {
    header("location:user/user.php");
}

include('./includes/db-connection.php'); // included db-connection to use $con variable to run query 

if (isset($_POST['register'])) {
    $usernameValue = $_POST['unameInput']; // assigning value of unameInput input to usernameValue variable
    $passwordValue = $_POST['pswdInput']; // assigning value of pswdInput input to passwordValue variable 
    $fName = $_POST['fnameInput'];
    $lName = $_POST['lnameInput'];


    $sql = "INSERT INTO user (username, password, First, Last) VALUES (?, ?, ?, ?)";
    $stmt = $dbcon->prepare($sql);
    $stmt->execute([$usernameValue, $passwordValue, $fName, $lName]);

    if ($stmt == true) {
?>
        <!-- True Error alert -->
        <script>
            alert("Register Successful");
            window.location.href = "dev-login.php";
        </script>

<?php
    } else {
        header("location:user/register.php");
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Register page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="./assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="./assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="./assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="./assets/plugins/summernote/summernote-bs4.min.css">


</head>


<body>

    <?php
    ?>

    <main class="form-signin w-50 m-auto">
        <div class="container text-center py-5">
            <form autocomplete="off" action="" method="post">
                <img class="mb-4 img-fluid"
                    src="https://img.freepik.com/free-photo/bank-card-mobile-phone-online-payment_107791-16646.jpg?t=st=1714573240~exp=1714576840~hmac=e3145a56ead6600ada92a8eba728a58bb26e556dcc8d7e24cbb190794b1c10bd&w=740"
                    alt="register logo" width="222" height="57">
                <h1 class="h3 mb-3 fw-normal text-capitalize">Please Register</h1>

                <div class="row justify-content-center align-items-center g-2">

                    <div class="col col-lg-6 form-floating my-3">
                        <label for="floatingUsername">Username</label>
                        <input type="text" class="form-control autocomplete-off" id="floatingUsername"
                            placeholder="username" name="unameInput" required>

                    </div>
                    <div class="col col-lg-6 form-floating my-3">
                        <label for="floatingPassword">Password</label>
                        <input type="password" class="form-control autocomplete-off" id="floatingPassword"
                            placeholder="Password" name="pswdInput" required>
                    </div>

                    <div class="col col-lg-6 form-floating my-3">
                        <label for="floatingFname">First Name</label>
                        <input type="text" class="form-control autocomplete-off" id="floatingFname" placeholder="Fname"
                            name="fnameInput" required>
                    </div>

                    <div class="col col-lg-6 form-floating my-3">
                        <label for="floatingLame">Last Name</label>
                        <input type="text" class="form-control autocomplete-off" id="floatingLame" placeholder="Lname"
                            name="lnameInput" required>

                    </div>

                </div>
                <button class="w-100 btn btn-lg btn-primary" name="register" type="submit">Register Now</button>
            </form>
        </div>
    </main>



    <?php
    /* include("./Components/footer.php"); */
    ?>
    <!-- jQuery -->
    <script src="./assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="./assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="./assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="./assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="./assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="./assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="./assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="./assets/plugins/moment/moment.min.js"></script>
    <script src="./assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="./assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="./assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="./assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="./assets/dist/js/pages/dashboard.js"></script>
</body>

</html>