<?php include '../controllers/cheaklogin.php';
include '../../database.php';
// دریافت پست از دیتابیس ُ
$stmt = $db->query("SELECT post_id, title,created_at FROM blog_posts ORDER BY created_at DESC ");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">ُ
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all-fonts.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
#sweetalert{
    text-decoration: none;
    width: 100px;
    padding: 10px;
    text-align: center;
    border-radius: 4px;
    font-size: 14px;
    background-color: red;
    color:white;
    border:none;
    transition: color 0.3s ease-in-out;


}
.alert{
    position: fixed;
    top: 20px;
    right: 20px;
    background-color:rgb(37, 230, 30);
    color:wheat;
    padding: 15px;
    border-radius: 5px;
    box-shadow:  0 4px 6px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
    z-index: 9999; 
    animation: fadeIn 0.5s ease fadeout 0.5s ease ; 
    }
    @keyframes fadeIn {
        from { opacity: 0; tronsform: translateY(20px); }
        to { opacity: 1; transform: translateY(0px); }
        
    } 
    @keyframes fadeout {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform:translateY(20px); }
        
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
                <?php
        // بررسی اینکه آیا پیامی داریم یا نه
if (isset($_SESSION['message'])) {
    echo '<div id="alert" class="alert">'.htmlspecialchars ($_SESSION['message']). '</div>';
    unset($_SESSION['message']);    
}  
        ?>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars(  $post['post_id']); ?></td>
                        <td><?php echo htmlspecialchars(  $post['title']); ?></td>
                        <td><?php echo  htmlspecialchars(  $post['created_at']); ?></td>
                        <!-- دکمه ویرایش و حذف با استفاده از کلاس active -->
                        <td>
                            <a href="edit_post.php?post_id=<?php echo htmlspecialchars($post['post_id']); ?>" class="btn btn-warning"><i class="fas fa-edit active"></i> Edit</a>
                            <a href="../controllers/delete_post.php?post_id= <?php echo htmlspecialchars( $post['post_id']); ?> " class="btn btn-danger" id="sweetalert"><i class='fas fa-trash active'></i> Delete</a>
                        </td> 
                    </tr>     
                <?php endforeach; ?>
                
            </tbody>
            
        </table>

    
     </div>
     <script>
        document.getElementById('sweetalert').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'are you sure you want to delete this post?',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = this.href;
                }
            });
        });
        document.getElementById('alert').addEventListener('click', function(event) {
    event.preventDefault();
    
    // بررسی کنید که آیا انیمیشن در حال اجرا است یا خیر
    if (!this.classList.contains('fadeOut')) {
        this.classList.add('fadeOut');
        setTimeout(() => {
            this.remove(); // حذف عنصر پس از اتمام انیمیشن
        }, 1000); // زمان انیمیشن: 1 ثانیه
    }
});
     </script>
     
</body>
</html>