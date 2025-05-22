<?php

// session started to prevent re-login after navigating throughout the website 
// session started at the head of login form to check if there already a user signed then redirect to user page
session_start();
if (isset($_SESSION['uid'])) {
    header("location:user/user.php");
}

include("./includes/db-connection.php"); // included db-connection to use $con variable to run query 

if (isset($_POST['login'])) {
    $usernameValue = $_POST['unameInput']; // assigning value of unameInput input to usernameValue variable
    $passwordValue = $_POST['pswdInput']; // assigning value of pswdInput input to passwordValue variable 

    // making a query 
    $qry = "SELECT * FROM `user` WHERE username='$usernameValue' AND password='$passwordValue'";

    $stmt = $dbcon->prepare($qry);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);
    if ($stmt->rowCount() > 0) {
        echo "Login Successfull";
        // header("location:user/user.php");

        print_r($result["id"]);

        session_start();
        $_SESSION["uid"] = $result["id"];
        $_SESSION["first"] = $result['First']; // assigned id variable to first session variable 
        $name = urlencode($_SESSION['first']);
        $_SESSION["last"] = $result['Last']; // assigned id variable to last session variable 
        $_SESSION["userProfile"] = $result['userProfile']; // assigned id variable to last session variable 
        $_SESSION['role'] = $result['role'];

        header("location:user/user.php?name=$name"); // redirected user to user page
    } else {
?>
        <script>
            alert("Login Failed");
        </script>
<?php
        // header("location:login.php");
    }
    // header("location: user/user.php");
    // header("location:user/user.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Login page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
</head>

<body>
    <main class="form-signin w-50 m-auto content-header">
        <div class="container text-center py-5 px-5">
            <form action="" method="post" autocomplete="off">
                <img class="mb-4 img-fluid"
                    src="https://img.freepik.com/free-vector/user-blue-gradient_78370-4692.jpg?t=st=1714572956~exp=1714576556~hmac=3cbcacdc5da138942e1363518e5779b06abd04bccaa1e7e24f21f90807f77d60&w=740"
                    alt="login logo" width="222" height="57">
                <h1 class="h3 mb-3 fw-normal text-capitalize">Please sign in - Dev Blog</h1>

                <div class="row justify-content-center align-items-center g-2">

                    <div class="col form-floating">
                        <label for="floatingUsername">Username</label>
                        <input type="text" class="form-control autocomplete-off" id="floatingUsername"
                            placeholder="admin" name="unameInput">
                    </div>
                    <div class="col form-floating my-3">
                        <label for="floatingPassword">Password</label>
                        <input type="password" class="form-control autocomplete-off" id="floatingPassword"
                            placeholder="Password" name="pswdInput">
                    </div>

                </div>

                <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
            </form>
        </div>
    </main>




    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assets/dist/js/pages/dashboard.js"></script>
</body>

</html>