<?php include '../controllers/cheaklogin.php';
include '../../database.php';
// دریافت پست از دیتابیس ُ
$stmt = $db->query("SELECT post_id, title,created_at FROM blog_posts ORDER BY created_at DESC ");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">ُ
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all-fonts.min.css">
</head>
<body>
    <!-- sidebar -->
     <?php include 'sidebar.php'; ?>
     <div class="main-content">
        <h1>Blog</h1>
        <table> 
            <thead>
                <tr>
                    <th>post_id</th>
                    <th>title</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars(  $post['post_id']); ?></td>
                        <td><?php echo htmlspecialchars(  $post['title']); ?></td>
                        <td><?php echo  htmlspecialchars(  $post['created_at']); ?></td>
                        <td>
                            <a href="edit_post.php?id=<?php echo htmlspecialchars($post['post_id']); ?>"><i class="fas fa-edit active"></i></a>
                            <a href="delete_post.php?id=<?php echo htmlspecialchars( $post['post_id']); ?>"><i class="fas fa-trash active"></i></a>
                        </td>
                    </tr>
                   
                <?php endforeach; ?>
            </tbody>
        </table>

    
     </div>
</body>
</html>