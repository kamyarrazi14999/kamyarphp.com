<?php
include './cheaklogin.php';
include '../../database.php';
// دریافت شناسه پست از get
$post_id = $_GET['post_id'] ?? '';
// حذف پست از دیتابیس
if($post_id){
    $stmt = $db->prepare("DELETE FROM blog_posts WHERE post_id = :post_id");
    $stmt->bindparam('post_id', $post_id);
    $stmt->execute();
    //نمایش پیغام  
    $_SESSION['message'] ="  پست یا بلاگ مورد نظر با موفقیت حذف شد"; 
}
else{
    $_SESSION['message'] = " شناسه پست وجود ندارد"; 
}
// بازگشت به صفحه بلاگ 
header('Location:../views/blog.php');
exit();
?>
