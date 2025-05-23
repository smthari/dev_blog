<meta http-equiv="refresh" content="1;url=/dev-blog/admin/allusers.php">

<?php
// session started for admin to enable adding a new study feature only for admin
session_start();
if (isset($_SESSION['uid'])) {    
} else {
    echo "error";
    header("location: login.php");
}


/* if (isset($_POST['DELETE'])) { */
    include('../includes/db-connection.php');

    // getting value of id using get method and assigned to id php variable 
    $id = $_GET['id'];

    /* created query statement to DELETE student data from student table where id = match id variable   */
    $DELETE = "DELETE FROM `user` WHERE id='$id'";

    $stmt = $dbcon->query($DELETE);

    if ($stmt == true) {
include("../components/toast.php");
        ?>
<script>
customToast("User Deleted");
// window.location.href = "/Admin-panel/Panel/admin/allstudents.php"
</script>
<?php
    } else {
        header("location:DELETE.php");
    }
/* } */

?>