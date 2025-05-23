<?php

session_start();

if (isset($_SESSION['uid'])) {

    /* echo $_SESSION['last']; */
} else {
    echo "error";
    header("location: login.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>All users</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->

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

    <style>
        td {
            vertical-align: middle;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php
    include("../components/topbar.php");
    include("../components/sidebar.php");
    ?>

    <div class="wrapper">
        <div class="content-wrapper">

            <div class="content-header">

                <div class="container-fluid px-5">
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <h5>All users</h5>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                                <li class="breadcrumb-item active">All users</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <main>
                <div class="container text-center">
                    <h2 class=" py-5">All Users</h2>

                    <?php
                    include('../includes/db-connection.php');
                    $qry = "SELECT * FROM `user` ORDER BY `id` DESC ";
                    $stmt = $dbcon->query($qry);

                    if ($stmt->rowCount() <= 0) {
                    ?>

                        <h4 class="text-center py-5"> No User to display Click to <a href="adduser.php">Add user </a> </h4>
                    <?php

                    } else {
                    ?>

                        <div class="container-fluid px-3">

                            <div class="row ">
                                <?php
                                while ($userItem = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <div class="col-md-3 py-4 px-3">
                                        <div class="card card-primary card-outline h-100 ">
                                            <div class="card-body box-profile">
                                                <div class="text-center pt-2">
                                                    <img src="../images/<?php echo $userItem['userProfile'] ? $userItem['userProfile'] : "artist.png" ?>" class="profile-user-img img-fluid img-circle border-0" alt="User profile picture">
                                                </div>
                                                <h3 class="profile-name text-center">
                                                    <?php echo $userItem['First'] . " " . $userItem['Last'] ?>
                                                </h3>
                                                <p class="text-username text-center">
                                                    <?php echo $userItem['username'] ?>
                                                </p>
                                                <div class="d-flex  justify-content-center w-100"
                                                    style="width: max-content !important;margin: auto;">

                                                    <a href="updateuser.php?id=<?php echo $userItem['id'] ?>"
                                                        class="mx-1 px-1 border border-1"><b><i
                                                                class="far fa-edit"></i></b></a>

                                                    <a href="deleteuser.php?id=<?php echo $userItem['id'] ?> "
                                                        onclick="return confirm('Do you really want to Delete ?');" class="mx-1 px-1 border border-1"><b><i
                                                                class="far fa-trash-alt"></i></b></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>

                        </div>

                    <?php
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>
    <?php
    include("../components/footer.php");
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