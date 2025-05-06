<meta http-equiv="refresh" content="1;url=/dev-blog/admin/allposts.php">

<?php
// session started for admin to enable adding a new study feature only for admin
session_start();
if (isset($_SESSION['uid'])) {    
} else {
    echo "error";
    header("location: ../login.php");
}


/* if (isset($_POST['DELETE'])) { */
    include('../includes/db-connection.php');

    // getting value of id using get method from url assgiend to action href in all todos and assigned to postId php variable 
    $postId = $_GET['id'];

    /* created query statement to DELETE todo data from todolist table where id = match postId variable   */
    $DELETE = "DELETE FROM `posts` WHERE id='$postId'";

    $stmt = $dbcon->query($DELETE);

    if ($stmt == true) {
        include("../Components/toast.php");
        ?>
<script>
customToast("Post Deleted");
</script>
<?php
// header("location:/Admin-panel/Panel/todo/alltodos.php");

    } else {
        // header("location:Admin-panel/Panel/todo/deletetodo.php");
    }

    
?>