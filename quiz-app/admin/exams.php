<?php
require '../config.php';
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
}
// CRUD مدیریت آزمون‌ها
include '../head.php';
?>
<!-- جدول نمایش آزمون‌ها با قابلیت ویرایش/حذف -->
<?php include '../footer.php'; ?>