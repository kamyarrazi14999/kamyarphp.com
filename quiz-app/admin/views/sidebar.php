<div class="sidebar">
    <div class="sidebar-header">
        <h2>Welcome <?php echo "admin" ?></h2>
    </div >
    <ul class="menu">
        <li><a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>" >Dashboard</a></li>
        <li><a href="blog.php" class="<?= basename($_SERVER['PHP_SELF']) == 'blog.php' ? 'active' : '' ?>">Blog</a>
            <ul class="submenu">
                <li><a href="blog.php" class="<?= basename($_SERVER['PHP_SELF']) == 'blogs.php' ? 'active' : '' ?>">Show Blogs</a></li>
                <li><a href="created_blog.php?from_menu=true" class="<?= basename($_SERVER['PHP_SELF']) == 'created_blog.php' ? 'active' : '' ?>">Add New Post</a></li>
            </ul>
            <li><a href="contact.php" class="<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>">Contact</a></li>
        </li>
        <li><a href="page.php" class="<?= basename($_SERVER['PHP_SELF']) == 'page.php' ? 'active' : '' ?>">Page</a></li>
        <li><a href="users.php" class="<?= basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : '' ?>">Users</a></li>
        <li><a href="rouels.php" class="<?= basename($_SERVER['PHP_SELF']) == 'rouels.php' ? 'active' : '' ?>">Rouels</a></li>
        <li><a href="product.php" class="<?= basename($_SERVER['PHP_SELF']) == 'product.php' ? 'active' : '' ?>">Product</a></li>
        <li><a href="settings.php" class="<?= basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : '' ?>">Settings</a></li>
    </ul>
</div>