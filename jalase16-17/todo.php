<?php

require './Canact.php';
// اضافه کردن ایتم جدید به دیتا بیست
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $item_name = $_POST['item_name'];
    $sql = "INSERT INTO todo (item_name) VALUES ('$item_name')";
    $nana->query($sql);
    echo "<script> alert('اضافه شد')</script>";
}
// برای این از متدگت استفاده می کنیم پایین آن از پست استفاده نشده
// برای اینکه متدی حذف کنیم باید به دیتابیست وصل شود
// این متد برای اینکه اطلاعات از دیتا بیست دریافت شود
// حذف ایتم با متدGET
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM todo WHERE id = $id";
    $nana->query($sql);
    echo "<script> alert('پاک شد')</script>";
}
// تغییر وضعیت ایتم
if (isset($_GET['complete'])) {
    $id = $_GET['complete'];
    $sql = "UPDATE todo SET is_completed = !is_completed WHERE id = $id ";
    $nana->query($sql);
}
// ارشیو کردن ایتم
if (isset($_GET['archived'])) {
    $id = $_GET['archived'];
    $sql = "UPDATE todo SET is_archived = !is_archived WHERE id = $id";
    $nana->query($sql);
}
// دریافت وضغیت نمایش
$show_archived = isset($_GET['show_archived']) && $_GET['show_archived'] == 'true';
// دریافت اطلاعات ایتم برای ارشیو کردن ایتم و وضعیت ارشیو

if ($show_archived) {
    $sql = 'SELECT * FROM todo WHERE is_archived = 1';
} else {
    $sql = 'SELECT * FROM todo WHERE is_archived = 0';
}

// $sgl="SELECT * FROM todo";
$result = $nana->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to do list</title>
    <link rel="stylesheet" href="./fontawesome/css/all-fonts.min.css" >
    <link rel="stylesheet" href="./css.css">
</head>
<body>
<div class="container">
<h1>to do list</h1>
<form  method="post"   action="">
 <input  type="text"      name="item_name" placeholder="add new item..." required><i  style="color: red;"  class="fas fa-star"> </i>  
    <button type="submit" name="add">add</button>



</form>

<?php
if ($show_archived) { ?>
 <a href="?show_archived=false"><button>show to do list</button></a>
<?php } else { ?>
 <a href="?show_archived=true"><button>show archived</button></a>
<?php }?>
<!-- ?شروع حلقه نمایش ایتم ما-->
 <?php while ($row = $result->fetch_assoc()) { ?>
    <div class= "todo-item <?php echo $row['is_completed'] ? 'completed' : ''; ?>">
<span><?php echo htmlspecialchars($row['id']); ?></span>
<span><?php echo htmlspecialchars($row['item_name']); ?></span>
<span><?php echo htmlspecialchars($row['create_at']); ?></span>
<div>
 <a href="?complete=<?php echo $row['id']; ?>">✅</a>
 <a href="?archived=<?php echo $row['id']; ?>">📦</a>
<a href="?delete=<?php echo $row['id']; ?>">❌</a>
 <a href="edit.php?id=<?php echo $row['id']; ?>">✏️</a>
                    


</div>
    </div>
<?php }?>
<!-- پایان حلقه نمایش ایتم ها-->

</div>
</body>
</html>