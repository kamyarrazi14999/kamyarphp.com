<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once '../../database.php';
try {
    // دریافت مقادیر فرم created_blog.php
$titel = $_POST['title'] ?? ''  ;
$content = $_POST['blogContent'] ?? ''  ;
$user_id = $_SESSION['user_id'] ?? ''  ;
 if(empty($titel) || empty($content)){
    // بررسی کردن اینکه محتوای یا بلاگ خالی نباشد
    throw new Exception('عنوان یا محتوای بلاگ نمی توانند خالی باشد');
 }
 $stmt = $db->prepare ("SELECT post_id FROM blog_posts WHERE title = :title AND user_id = :user_id");
 $stmt->execute(['title' => $titel, 'user_id' => $user_id]);
$exists_post = $stmt->fetch(PDO::FETCH_ASSOC);    

} catch (Exception $e) {
}

?>