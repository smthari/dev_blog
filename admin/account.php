<?php
// session started for admin to enable adding a new study feature only for admin
session_start();
if (isset($_SESSION['uid'])) {
    $id = $_SESSION['uid'];
    // echo $id;
} else {
    echo "error";
    header("location: ../login.php");
}

if (isset($_POST['updateAdmin'])) {
    include('../includes/db-connection.php');

    $usernameValue = trim($_POST['unameInput']);
    $passwordValue = trim($_POST['pswdInput']);
    $fName = trim($_POST['fnameInput']);
    $lName = trim($_POST['lnameInput']);

    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];

    move_uploaded_file($tempname, "../images/$filename");

    if ($tempname != "") {
        $updateQuery = "UPDATE `admin` SET `username`='$usernameValue',`password`='$passwordValue',`First`='$fName',`Last`='$lName',`adminProfile`='$filename' WHERE id=$id";
    } else {
        $updateQuery = "UPDATE `admin` SET `username`='$usernameValue',`password`='$passwordValue',`First`='$fName',`Last`='$lName' WHERE id=$id";
    }


    // $updateQuery = "UPDATE `admin` SET `username`='$usernameValue',`password`='$passwordValue',`First`='$fName',`Last`='$lName',`adminProfile`='$filename' WHERE id=$id";

    $stmt = $dbcon->prepare($updateQuery);

    $stmt->execute();

    if ($stmt == true) {
        include("../Components/toast.php");
?>
        <script>
            customToast("Your detail Updated");
        </script>
<?php
    } else {
        header("location:admin/account.php");
    }
}

?>

<!doctype html>
<html lang="en">


<head>
    <title>Account</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->

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
                            <h5>Admin Profile</h5>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dev-blog/admin/admin.php">Home</a></li>
                                <li class="breadcrumb-item active">Account</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <main>
                <?php
                include('../includes/db-connection.php');

                $qry = "SELECT * FROM admin WHERE id='$id'";
                $stmt = $dbcon->query($qry);

                if ($stmt->rowCount() < 1) {
                ?>
                    <script>
                        alert('No record found');
                        document.getElementById("myAnchor").focus();
                    </script>

                <?php
                } else {
                    $result = $stmt->fetch(PDO::FETCH_OBJ)
                ?>

                    <div class="container py-5 my-5 m-auto mx-5 px-5">
                        <!-- NOTE:- multipart/form-data solved update image array key undefind error  -->
                        <form class="needs-validation" action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12 text-center">
                                    <img src="../images/<?php echo $result->adminProfile ? $result->adminProfile : "artist.png" ?>"
                                        class="img-thumbnail w-50 my-5 rounded-circle" style="width:150px !important;"
                                        alt="Avatar">
                                </div>

                                <!--<?php echo $result->adminProfile ? $result->adminProfile : "nahi hai" ?>-->
                                <div class="col-md-6 pt-3">
                                    <label class="form-label">Username:</label>
                                    <input class="form-control" type="text" name="unameInput"
                                        value="<?php echo $result->username ?>" placeholder="Full Name" required readonly>
                                </div>

                                <div class="col-md-6 pt-3">
                                    <label class="form-label">Password:</label>
                                    <input class="form-control" type="text" name="pswdInput"
                                        value="<?php echo $result->password; ?>" placeholder="Contact Number" required>
                                </div>

                                <div class="col-md-12 pt-3">
                                    <label class="form-label">First Name:</label>
                                    <input class="form-control" type="text" name="fnameInput"
                                        value="<?php echo $result->First; ?>" placeholder="Contact Number" required>
                                </div>

                                <div class="col-md-12 pb-3 pt-3">
                                    <label class="form-label">Last Name:</label>
                                    <input class="form-control" type="text" name="lnameInput"
                                        value="<?php echo $result->Last; ?>" placeholder="Contact Number" required>
                                </div>

                                <div class="col-md-12 pb-3">
                                    <label class="form-label">Image: </label>
                                    <input class="form-control h-auto" type="file" name="uploadfile"
                                        accept="image/png, image/gif, image/jpeg, image/jpg">
                                </div>

                                <button class="btn btn-primary" type="submit" name="updateAdmin">Update Profile</button>
                            </div>

                        </form>
                    </div>
                <?php
                }
                ?>

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


    <script>
        document.getElementById("myAnchor").focus();
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