<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/dev-blog/index.php" class="brand-link">
    <img src="../assets/DEV_BLOG_LOGO_dark.png"
      alt="AdminLTE Logo" style="width:15rem;text-align:center;vertical-align:middle">
    <!-- <span class="brand-text font-weight-light">Dev Blog</span> -->
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="../images/<?php echo $_SESSION['profilPic']; ?>"
                    class="img-circle elevation-2" alt="User Image"> -->
        <?php
        include('../includes/db-connection.php');

        $qry = "SELECT * FROM admin WHERE id='$_SESSION[uid];'";
        $stmt = $dbcon->query($qry);
        $result = $stmt->fetch(PDO::FETCH_OBJ)
        ?>
        <!-- real time profile picture update  -->
        <img src="../images/<?php echo $result->adminProfile ? $result->adminProfile : "artist.png" ?>" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <a href="/dev-blog/admin/account.php"
          class="d-block"><?php echo $_SESSION['first'];
                          echo " ";
                          echo $_SESSION['last']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/dev-blog/admin/admin.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/dev-blog/admin/allposts.php" class="nav-link">
            <i class="fas fa-edit nav-icon"></i>
            <p>All Posts</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/dev-blog/admin/addpost.php" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>Add Post</p>
          </a>
        </li>


        <!--   <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-book"></i>

            <p>
              Posts
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/dev-blog/admin/addpost.php" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Add Post</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/dev-blog/admin/allposts.php" class="nav-link">
                <
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Manage Posts</p>
              </a>
            </li>
          </ul>
        </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>