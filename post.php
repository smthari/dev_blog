<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post page</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>

<body>
    <?php
    include('includes/db-connection.php');
    $id = $_GET['id'];
    $result = $dbcon->query("SELECT * FROM posts WHERE id=$id");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    ?>

    <?php
    include("./includes/header.php");
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
    include("./includes/footer.php");
    ?>

</body>

</html>