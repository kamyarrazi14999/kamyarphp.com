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
$existing_post = $stmt->fetch(PDO::FETCH_ASSOC); 
if ($existing_post){
    // update the post
$stmt = $db->prepare (' UPDATE blog_posts SET content = :content WHERE post_id = :post_id');
$stmt->execute(['content' => $content, 'post_id' => $existing_post['post_id']]);
$_SESSION['massage'] = "$title با موفقیت بروزرسانی شد";
    
} 
else {
    // insert post
    $stmt = $db->prepare ('INSERT INTO blog_posts (title, content, user_id) VALUES (:title, :content, :user_id)');
    $stmt->execute([' title'=>$title, 'content'=>$content, 'user_id'=>$user_id ]);
    $_SESSION['massage'] = "$title با موفقیت ثبت شد";
} 
// ذخیره اطلاعات در متن برای نمایش مجدد به کاربر در فرم 
$_SESSION['title'] = $titel;
$_SESSION['content'] = $content;
header('location: ../views/created_blog.php');
 exit();  


} catch (Exception $e) {
    $_SESSION['massage'] = 'خطا در ذخیره سازسی پست '.$e->getMessage();
    header('location:../views/created_blog.php');
    exit();

}

?>