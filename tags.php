<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tags | Dev Blog</title>
    <link rel="stylesheet" href="CSS/main.css">
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

    <main class="pageContainer">
        <div class="titleDiv">
            <h4>Tags</h4>
            <div class="line"></div>
        </div>
        <section class="tags-page"><a class="tagcategory" href="/gatsby">
                <h4>Gatsby</h4>
                <p>1 posts</p>
            </a><a class="tagcategory" href="/git-and-github">
                <h4>Git &amp; Github</h4>
                <p>1 posts</p>
            </a><a class="tagcategory" href="/html-and-css">
                <h4>HTML &amp; CSS</h4>
                <p>16 posts</p>
            </a><a class="tagcategory" href="/javascript">
                <h4>Javascript</h4>
                <p>25 posts</p>
            </a><a class="tagcategory" href="/projects">
                <h4>Projects</h4>
                <p>16 posts</p>
            </a><a class="tagcategory" href="/react">
                <h4>React</h4>
                <p>1 posts</p>
            </a><a class="tagcategory" href="/resources">
                <h4>Resources</h4>
                <p>2 posts</p>
            </a><a class="tagcategory" href="/snippets">
                <h4>Snippets</h4>
                <p>1 posts</p>
            </a><a class="tagcategory" href="/tipstricks">
                <h4>Tips/tricks</h4>
                <p>1 posts</p>
            </a><a class="tagcategory" href="/tutorial">
                <h4>Tutorial</h4>
                <p>14 posts</p>
            </a>
        </section>
    </main>

    <?php
    include("./includes/footer.php");
    ?>

</body>

<script src="assets/main.js"></script>

</html>