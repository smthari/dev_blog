<?php

// session started for admin to enable adding a new study feature only for admin
session_start();
if (isset($_SESSION['uid'])) {
    // in above code we checked session started or not using session id 
    // echo $_SESSION['last'];
} else {
    echo "error";
    header("location: ../login.php");
}

if (isset($_POST['submitbtn'])) {
    include('../includes/db-connection.php');

    // Get your POST variables
    $postTitleValue = $_POST['postTitle'];
    $postdescription = $_POST['postdescription'];
    $postBodyValue = $_POST['postBody'];
    $postTagsValue = $_POST['postTags'];
    $postReadTimeValue = $_POST['postReadTime'];

    // Prepare the SQL statement with placeholders
    $qry = "INSERT INTO `posts`(`title`, `description`, `body`, `tags`, `readTime`) 
        VALUES (:title, :description, :body, :tags, :readTime)";

    // Prepare and execute with parameters
    $stmt = $dbcon->prepare($qry);
    $stmt->execute([
        ':title' => $postTitleValue,
        ':description' => $postdescription,
        ':body' => $postBodyValue,
        ':tags' => $postTagsValue,
        ':readTime' => $postReadTimeValue
    ]);

    if ($stmt == true) {
        include("../Components/toast.php");
?>
        <script>
            customToast("New Post Added");
        </script>

<?php
    } else {
        header("location:/dev-blog/admin/addpost.php");
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Add Post</title>
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
                            <h5>Add Post</h5>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dev-blog/admin/allposts.php">All Post</a>
                                </li>
                                <li class="breadcrumb-item active">Add Post</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <main>
                <div class="container h-100 py-5">
                    <div class="row container m-auto py-5">
                        <div class=" col-md-12 col-lg-12 ">
                            <h4 class=" mb-5">Add Post</h4>
                            <form class="needs-validation" action="addpost.php" method="post"
                                enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Title:</label>
                                        <input class="form-control" type="text" name="postTitle"
                                            placeholder="Post Title" required>
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Description:</label>
                                        <input class="form-control" type="text" name="postdescription"
                                            placeholder="Post Description" required>
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Tags:</label>
                                        <input class="form-control" type="text" name="postTags"
                                            placeholder="Post Tags" required>
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Read Time:</label>
                                        <input class="form-control" type="text" name="postReadTime"
                                            placeholder="Post Read Time" required>
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Body:</label>
                                        <textarea class="form-control" rows="4" cols="50"" name=" postBody" placeholder="Post Content" required></textarea>
                                    </div>
                                </div>

                                <div class="row g-3 pt-3">
                                    <div class="col-md-12">
                                        <input class="w-100 btn btn-primary btn-lg" value="Add Post" type="submit"
                                            name="submitbtn" />
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
    include("../Components/panelFooter.php");
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