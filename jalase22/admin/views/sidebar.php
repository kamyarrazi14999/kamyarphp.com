<
<div class="sidebar">
    <div class="sidebar-header">
        <h2>Welcome <?php echo $_SESSION['username'] ?? "" ?></h2>
    </div >
    <ul class="menu">
        <li><a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>"><i class="fas fa-tachometer-alt mama"></i> Dashboard</a> </li>
        <li><a href="blog.php" class="<?= basename($_SERVER['PHP_SELF']) == 'blog.php' ? 'active' : '' ?>"><i class="fas fa-newspaper  mama"></i> Blog </a>
    <ul class="sub-menu">
        <li> <a href=" blog.php " class="<?= basename($_SERVER['PHP_SELF']) == 'show_blog.php' ? 'active' : ''?>"> Show Post </a></li>
        <li> <a href="created_blog.php? from_menu=true" class="<?= basename($_SERVER['PHP_SELF']) == 'created_blog.php' ? 'active' : ''?> "> Add Post</a></li>
    </ul>
    </li>
        <li><a href="page.php" class="<?= basename($_SERVER['PHP_SELF']) == 'page.php' ? 'active' : '' ?>"> <i class="fas fa-file bab mama"></i> Page</a></li>
        <li><a href="users.php" class="<?= basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : '' ?>"> <i  class="fas fa-users mama"></i>Users</a></li>
        <li><a href=" media.php" class="<?= basename($_SERVER['PHP_SELF']) == 'media.php' ? 'active' : ''?> "> <i class="fas fa-images mama"></i>Media</a></li>
        <li><a href=""> <i class="fas fa-store mama"></i> commerce Hub</a>
        <ul class="sub-menu">
            <li> <a href="products.php" class="<?= basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : ''?> "> <i class="fas fa-box mama"></i>Products</a></li>
            <li> <a href="orders.php" class="<?= basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'active' : ''?>"> <i class="fas fa-truck mama"></i>Orders</a></li>
            <li> <a href="customers.php" class="<?= basename($_SERVER['PHP_SELF']) == 'customers.php' ? 'active' : ''?> "> <i class="fas fa-users mama"></i>Customers</a></li>
            <li> <a href="reports.php" class="<?= basename($_SERVER['PHP_SELF']) =='reports.php' ? 'active' : ''?>"> <i class="fas fa-chart-line mama"></i>Reports</a></li>
            <li> <a href="store_settings.php" class="<?= basename($_SERVER['PHP_SELF']) == ' store_setting.php' ? 'active' : ''?> ">  <i class="fas fa-store mama"></i> Store Setting</a></li>
            <li> <a href="discounts.php" class="<?= basename($_SERVER['PHP_SELF']) == 'discounts_copouns.php' ? 'active' : ''?> "> <i class="fas fa-percent mama"></i>Discounts and Copouns </a></li>
            <li> <a href="massages_notification.php" class="<?= basename($_SERVER['PHP_SELF']) =='massages_notification.php' ? 'active' : ''?>"> <i class="fas fa-shipping-fast mama"></i>Massages and Notification</a></li>
            <li> <a href="extension.php" class="<?= basename($_SERVER['PHP_SELF']) == 'extension.php' ? 'active' : ''?> "> <i class="fas fa-shipping-fast mama"></i> Extension</a></li>
            
        </ul>
    </li>
        <li><a href=" settings.php" class="<?= basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''?> "> <i class="fas fa-cogs mama"></i>Settings</a></li>
    </ul>
</div>