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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
                            <a href="tags.php?tag=<?= urlencode($tag) ?>">
                                <span class="category postcategory "><?= htmlspecialchars($tag) ?></span>
                            </a>
                    <?php endif;
                    endforeach; ?>

                    <p><?php echo $row['created_at']; ?></p>
                    <p> <i class="ion-android-create"></i>
                        <a href="author.php?author=<?= $row['author'] ?>">
                            <?php echo $row['author'] ?>
                        </a>
                    </p>
                    <div class="underline"></div>
                </div>

                <div><?php echo $row['body']; ?></div>
            </article>

            <div id="disqus_thread"></div>
            <script>
                var disqus_config = function() {
                    this.page.url = "https://dev-blog.free.nf/post.php?id=<?= $row['id']; ?>"; // Replace with dynamic post URL
                    this.page.identifier = "post_<?= $row['id']; ?>"; // Unique identifier for each post
                };

                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://dev-blog-15.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </section>

    </main>

    <?php
    include("./components/footer.php");
    ?>

    <script id="dsq-count-scr" src="//dev-blog-15.disqus.com/count.js" async></script>

</body>

<script src="JS/main.js"></script>


</html>