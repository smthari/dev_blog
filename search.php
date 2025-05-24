 <?php
    include("./includes/db-connection.php");

    if (isset($_GET['query'])) {
        $search = htmlspecialchars($_GET['query']);

        $stmt = $dbcon->prepare("SELECT * FROM posts 
        WHERE title LIKE ? 
        OR description LIKE ? 
        OR body LIKE ? 
        OR tags LIKE ?
        ORDER BY created_at DESC");

        $searchTerm = "%$search%";
        $stmt->execute([$searchTerm, $searchTerm, $searchTerm, $searchTerm]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultcount = $stmt->rowCount();
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
                     <h4>( <?php echo $resultcount ?> ) Result for <?php echo $searchTerm ?></h4>
                     <div class="line"></div>
                 </div>
                 <section class="posts" style="margin-top:2rem">
                     <div class="post-center">
                         <article>
                             <?php if ($results): ?>
                                 <?php foreach ($results as $post): ?>

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
             <?php endif;
                            } ?>

                 </section>
             </section>
         </main>

         <?php
            include("./components/footer.php");
            ?>
     </body>

     <script src="JS/main.js"></script>

     </html>