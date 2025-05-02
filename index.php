<!DOCTYPE html>
<html lang="en">

<head>
    <meta charSet="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta data-react-helmet="true" name="author" content="Sumit Harijan" />
    <meta data-react-helmet="true" name="description"
        content="Explore Learn And Build this blog is about web development" />
    <link rel="stylesheet" href="CSS/main.css">
    <title>Home | Dev Blog</title>

</head>

<body>

    <?php
    include("./includes/header.php");

    ?>

    <aside class="sidebar ">
        <button class="close-btn">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em"
                width="1em" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M405 136.798L375.202 107 256 226.202 136.798 107 107 136.798 226.202 256 107 375.202 136.798 405 256 285.798 375.202 405 405 375.202 285.798 256z">
                </path>
            </svg>
        </button>
        <div class="sidebar-container">
            <ul class="sidebar-links">
                <li><a aria-current="page" class="page-link " href="/">Home</a></li>
                <li><a class="page-link" href="/posts.html">Posts</a></li>
                <li><a class="page-link" href="/tags.html">Tags</a></li>
            </ul>
        </div>
    </aside>
    <main>

        <section class="home">
            <div class="intro">
                <div class="intro-text">
                    <h1>Explore</h1>
                    <h3>Learn and build </h3>
                    <p>this blog is about web development</p>
                </div>
                <div class="cta">
                    <a href="/tags.html">
                        <button class="cta-action">Start Learning &amp; building </button>
                    </a>
                </div>
            </div>
            <div class="tags">
                <div class="tags-cta">
                    <a href="/gatsby">
                        <button class="cta-tag Gatsby">Gatsby</button>
                    </a>
                    <a href="/git-and-github">
                        <button class="cta-tag Git &amp; Github">Git &amp; Github </button>
                    </a>
                    <a href="/html-and-css">
                        <button class="cta-tag HTML &amp; CSS">HTML &amp; CSS </button>
                    </a>
                    <a href="/javascript">
                        <button class="cta-tag Javascript">Javascript</button>
                    </a>
                    <a href="/projects">
                        <button class="cta-tag Projects">Projects</button>
                    </a>
                    <a href="/react">
                        <button class="cta-tag React">React</button>
                    </a>
                    <a href="/resources">
                        <button class="cta-tag Resources">Resources</button>
                    </a>
                    <a href="/snippets">
                        <button class="cta-tag Snippets">Snippets</button>
                    </a>
                    <a href="/tipstricks">
                        <button class="cta-tag Tips/tricks">Tips/tricks</button>
                    </a>
                </div>
            </div>
        </section>

        <section class="posts">
            <div class="titleDiv">
                <h4>latest posts</h4>
                <div class="line"></div>
            </div>
            <?php
            include("./includes/db-connection.php");
            $qry = "SELECT * FROM `posts` ORDER BY created_at DESC";
            $result = $dbcon->query($qry);

            if ($result->rowCount() <= 0) {
                echo "<h1>No posts available</h1>";
            } else {
            ?>

                <div class="post-center">
                    <article class="postContainer">
                        <?php

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <section class="article">
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
                                    <p><?php echo substr($row['body'], 0, 100) . '...'  ?></p>
                                    <footer class="footer"><span class="date"><svg stroke="currentColor" fill="currentColor"
                                                stroke-width="0" viewBox="0 0 512 512" class="icon" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z">
                                                </path>
                                            </svg><?php echo $row["created_at"] ?></span><span><?php echo $row["readTime"] ?> min read</span>
                                    </footer>
                                </div>
                            </section>
                    <?php
                            /*  echo "<h2><a href='post.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h2>";
                    echo "<p>" . substr($row['body'], 0, 100) . "...</p>"; */
                        }
                    }

                    ?>


                    </article>
                </div>
        </section>

        <div style="text-align:center;padding:3rem"><a href="posts.php"><button class="cta-action">All posts
                </button></a></div>
    </main>


    <?php
    include("./includes/footer.php");
    ?>

</body>
<script src="JS/main.js"></script>

</html>