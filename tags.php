<?php
include('includes/db-connection.php'); // your DB connection
session_start();

$tag = $_GET['tag'] ?? null;

if (!$tag) {
    echo "Tag not specified.";
    exit;
}

// Fetch posts where the tag is found in the comma-separated list
$stmt = $dbcon->prepare("SELECT * FROM posts WHERE FIND_IN_SET(?, tags) ORDER BY created_at DESC");
$stmt->execute([$tag]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>Posts tagged with: <?= htmlspecialchars($tag) ?></title>
</head>

<body>

    <?php
    include("./components/header.php");
    include("./components/aside.php");
    ?>
    <main style="height: -webkit-fill-available;">
        <section class="pageContainer">
            <div class="titleDiv">
                <h4>tag: <?= htmlspecialchars($tag) ?> </h4>
                <div class="line"></div>
            </div>
            <section class="posts" style="margin-top:2rem">

                <div class="post-center">
                    <article>
                        <?php if ($posts): ?>
                            <?php foreach ($posts as $post): ?>

                                <section class="article" style="margin-top:1rem">
                                    <div class="info">
                                        <h4 style="margin:0 !important"><a class="link" href="post.php?id=<?= $post['id'] ?>"> <?= htmlspecialchars($post['title']) ?> </a></h4>
                                    </div>
                                </section>
                            <?php endforeach; ?>

                    </article>
                </div>
            <?php else: ?>
                <p>No posts found with this tag.</p>
            <?php endif; ?>

            </section>
        </section>
    </main>
    <?php
    include("./components/footer.php");
    ?>
</body>

<script src="JS/main.js"></script>

</html>