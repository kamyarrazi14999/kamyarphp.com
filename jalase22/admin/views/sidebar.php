
<div class="sidebar">
    <div class="sidebar-header">
        <h2>Welcome <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "admin" ?></h2>
    </div >
    <ul class="menu">
        <li><a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>"><i class="fas fa-tachometer-alt mama"></i> Dashboard</a> </li>
        <li><a href="blog.php" class="<?= basename($_SERVER['PHP_SELF']) == 'blog.php' ? 'active' : '' ?>"><i class="fas fa-newspaper  mama"></i> Blog </a>
    <ul class="sub-menu">
        <li> <a href=" blog.php " class="<?= basename($_SERVER['PHP_SELF']) == 'show_blog.php' ? 'active' : ''?>"> Show Post </a></li>
        <li> <a href="created_blog.php" class="<?= basename($_SERVER['PHP_SELF']) == 'created_blog.php' ? 'active' : ''?> "> Add Post</a></li>
    </ul>
    </li>
        <li><a href="page.php" class="<?= basename($_SERVER['PHP_SELF']) == 'page.php' ? 'active' : '' ?>"> <i class="fas fa-file bab mama"></i> Page</a></li>
        <li><a href="users.php" class="<?= basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : '' ?>"> <i  class="fas fa-users mama"></i>Users</a></li>
        <li><a href=" media.php" class="<?= basename($_SERVER['PHP_SELF']) == 'media.php' ? 'active' : ''?> "> <i class="fas fa-images mama"></i>Media</a></li>
        <li><a href=" product.php" class="<?= basename($_SERVER['PHP_SELF']) == 'product.php' ? 'active' : ''?>"> <i class="fas fa-boxes mama"></i>Product</a></li>
        <li><a href=" orders.php " class="<?= basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'active' : ''?>"> <i class="fas fa-truck mama"></i>Orders</a></li>
        <li><a href=" settings.php" class="<?= basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''?> "> <i class="fas fa-cogs mama"></i>Settings</a></li>
    </ul>
</div>