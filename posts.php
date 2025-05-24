<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>Posts | Dev Blog</title>
</head>

<body>

    <?php
    include("./components/header.php");
    include("./components/aside.php");
    ?>

    <main style="height: -webkit-fill-available;">
        <section class="postPageContainer">
            <section>

                <?php
                include("./includes/db-connection.php");
                $qry = "SELECT * FROM `posts` ORDER BY created_at DESC";
                $result = $dbcon->query($qry);

                if ($result->rowCount() <= 0) {
                    echo "<h1>No posts available</h1>";
                } else {
                ?>
                    <div class="titleDiv" style="margin-top: 2rem;">
                        <h4><?php echo $result->rowCount() ?> Posts </h4>
                        <div class="line"></div>
                    </div>
                    <div class="post-center">

                        <?php

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <section class="article" style="margin: 2rem 0;">
                                <div class="info">

                                    <?php
                                    $tags = explode(',', $row['tags']);
                                    foreach ($tags as $tag):
                                        $tag = trim($tag);
                                        if (!empty($tag)):
                                    ?>
                                            <span class="category"><?= htmlspecialchars($tag) ?></span>
                                    <?php endif;
                                    endforeach; ?>
                                    <a class="link" href="post.php?id=<?php echo $row['id'] ?>">
                                        <h3><?php echo $row['title'] ?></h3>
                                    </a>
                                    <div class="underline"></div>
                                    <p><?php echo substr($row['description'], 0, 100) . '...'  ?></p>
                                    <footer class="footer">
                                        <span class="date">
                                            <svg stroke="currentColor" fill="currentColor"
                                                stroke-width="0" viewBox="0 0 512 512" class="icon" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z">
                                                </path>
                                            </svg>
                                            <?php echo $row["created_at"] ?>
                                        </span>
                                        <span>
                                            <?php echo $row["readTime"] ?> min read
                                        </span>
                                    </footer>
                                </div>
                            </section>
                    <?php
                        }
                    }
                    ?>

                    </div>
            </section>

            <section>
                <div class="titleDiv">
                    <h4></h4>
                    <!-- <div class="line"></div> -->
                </div>
                <div class="post-center" style="margin-top: 4.5rem;">
                    <article class="post-info">

                        <?php
                        include('includes/db-connection.php'); // your DB connection

                        $stmt = $dbcon->prepare("SELECT tags FROM posts");
                        $stmt->execute();
                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $totalTags = count($rows);

                        $allTags = [];

                        foreach ($rows as $row) {
                            $tags = explode(',', $row['tags']);
                            foreach ($tags as $tag) {
                                $cleanTag = strtolower(trim($tag));
                                if (!empty($cleanTag)) {
                                    $allTags[] = $cleanTag;
                                }
                            }
                        }

                        // Remove duplicates
                        $uniqueTags = array_unique($allTags);
                        sort($uniqueTags); // optional: alphabetically sort
                        ?>

                        <section class="article" style="margin-top: 2rem; overflow: auto; height: 400px;">
                            <p>Tags: <?php echo $totalTags ?></p>
                            <div class="underline"></div>
                            <div>
                                <?php foreach ($uniqueTags as $tag): ?>
                                    <h3><a class="link" href="tags.php?tag=<?= urlencode($tag) ?>">
                                            <span class="category postcategory "><?= htmlspecialchars($tag) ?></span>
                                        </a></h3>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    </article>
                </div>

                <div class="post-center" style="margin-top: 4.5rem;">
                    <article class="post-info">

                        <?php
                        include('includes/db-connection.php'); // your DB connection

                        $stmt2 = $dbcon->prepare("SELECT DISTINCT author FROM posts WHERE author IS NOT NULL AND author != '' ORDER BY author ASC");
                        $stmt2->execute();
                        $authors = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                        $totalauthors =  $stmt2->rowCount();
                        ?>

                        <section class="article" style="margin-top: 2rem; overflow: auto; height: 600px;">
                            <p>Authors: <?php echo $totalauthors ?></p>
                            <div class="underline"></div>
                            <div>
                                <?php foreach ($authors as $row): ?>
                                    <h3>
                                        <a class="link" href="author.php?author=<?= urlencode($row['author']) ?>">
                                            <span class="category postcategory "><?= htmlspecialchars($row['author']) ?></span>
                                        </a>
                                    </h3>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    </article>
                </div>
            </section>
        </section>
    </main>

    <?php
    include("./components/footer.php");
    ?>

</body>

<script src="JS/main.js"></script>

</html>