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
    <style>
table{
    width: 100%;
    border-collapse: collapse;
    margin-top: 40px;
}
tr th{
    background-color: #ff1;
}
th , td{
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
th{
   background-color: #f2f2f2;
   color: #333; 
}
td{
    background-color: #f2f2f2;  
}

tr:nth-child(even) td{
    background-color: #b9c8c7;

    
}
tr:nth-child(odd) td{
    background-color: #fff;
}
tr:hover td {
    background-color: #b9c;
}
.btn{
    padding: 10px 16px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
}
.btn-danger{
    background-color: red;
    color:white;
    border:none;
  
}
.btn-primery{
    background-color: green;
    color:white;
    border:none;
}
.btn:hover{
opacity: 0.8;
}
.action-btns{
    display: flex;
    gap: 10px;
    
}
.btn-warning{  
    background-color: orange;
    color:white;
    border:none;
}
.active{
    animation-name: zara;
    animation-duration: 1s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    animation-fill-mode: forwards;
}
@keyframes zara {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}











    </style>
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
                        <!-- دکمه ویرایش و حذف با استفاده از کلاس active -->
                        <td>
                            <a href="edit_post.php?id=<?php echo htmlspecialchars($post['post_id']); ?>" class="btn btn-warning"><i class="fas fa-edit active"></i> Edit</a>
                            <a href="delete_post.php?id=<?php echo htmlspecialchars( $post['post_id']); ?> " class="btn btn-danger"     onclick="return confirm('Are you sure?')"><i class='fas fa-trash active'></i> Delete</a>
                        </td>
                    </tr>
                   
                <?php endforeach; ?>
            </tbody>
        </table>

    
     </div>
</body>
</html>