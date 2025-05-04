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
    include("./components/aside.php");
    ?>
    <main>
        <section class="postTemplate page-container">
            <article>

                <div class="post-info">
                    <h2><?php echo $row['title']; ?></h2>
                    <?php
                    $tags = explode(',', $row['tags']);
                    foreach ($tags as $tag):
                        $tag = trim($tag);
                        if (!empty($tag)):
                    ?>
                            <span class="category postcategory "><?= htmlspecialchars($tag) ?></span>
                    <?php endif;
                    endforeach; ?>
                    <p><?php echo $row['created_at']; ?></p>
                    <div class="underline"></div>
                </div>

                <div><?php echo $row['body']; ?></div>
            </article>
        </section>
    </main>

    <?php
    include("./components/footer.php");
    ?>

</body>

<script src="JS/main.js"></script>


</html>