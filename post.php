<?php
include('includes/db-connection.php');
$id = $_GET['id'];
$result = $dbcon->query("SELECT * FROM posts WHERE id=$id");
$row = $result->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title']; ?> - Dev Blog</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>

<body>
    <?php
    include("./components/header.php");
    ?>
    <main>
        <section class="postTemplate">
            <article>
                <h1><?php echo $row['title']; ?></h1>
                <p><?php echo $row['body']; ?></p>
            </article>
        </section>
    </main>

    <?php
    include("./components/footer.php");
    ?>

</body>

</html>