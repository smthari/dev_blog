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
            <!-- <li><a aria-current="page" class="page-link " href="/dev-blog/index.php">Home</a></li>
            <li><a class="page-link" href="/dev-blog/posts.php">Posts</a></li> -->

            <?php if (isset($_SESSION['uid'])): ?>
                <li><a class="page-link border" href="user/addpost.php">Create Post</a></li>
            <?php else: ?>
                <li><a class="page-link border" href="register.php">Create Account</a></li>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['uid'])): ?>
                <div class="dropdown">
                    <button class="dropdown-toggle">Hello, <?php echo $_SESSION['first']; ?>!</button>
                    <div class="dropdown-menu">
                        <a href="admin/admin.php" class="dropdown-item">Dashboard</a>
                        <a href="admin/account.php" class="dropdown-item">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            <?php else: ?>

                <div class="dropdown">
                    <button class="dropdown-toggle">Login</button>
                    <div class="dropdown-menu">
                        <a href="admin/admin.php" class="dropdown-item">Developer</a>
                        <div class="dropdown-divider"></div>
                        <a href="login.php" class="dropdown-item">Admin</a>
                    </div>
                </div>

            <?php endif; ?>
        </ul>
    </div>
</aside>