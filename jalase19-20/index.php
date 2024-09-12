<?php
//پیدا کردن مسیر جاری کاربر از طریق متغییر سیستم
$directory =isset($_GET['dir']) ?'./uploads/' .$_GET['dir'] : './uploads/';
// لیست فایل ها و فولدر ها در مسیر جاری کاربر دریافت می‌کند
$files= scandir($directory);
//دریافت مشخصات کاربر در مسیر جاری
function getFilleDetails($file_path){
    return[
        'size'=>filesize($file_path),
        'modified'=>date('f d Y H:i:s', filemtime($file_path)),
        'created'=>date('f d Y H:i:s', filectime($file_path)),
        // دریافت مجوز های فایل به صورت کارکردی یا ناکارکردی باشد
        // 'permissions'=>substr(decoct(fileperms($file_path)), -4),
           // دریافت وضعیت خواندن و نوشتن فایل
        // 'readable'=>is_readable($file_path),
        
        // 'writable'=>is_writable($file_path),
        // 'executable'=>is_executable($file_path),
        // 'file_name'=>$file_path
    ];

} 

// برای تبدیل فولدر به مسیر
function getBreadcrumb($dir){
    $parts = explode('/',$dir);
    $breadcrumb = '';
    $currentPath = '';

    foreach($parts as $part){
        if($part !== ''){
            $currentPath .= $part . '/';
            $breadcrumb .='
            <a href="index.php?dir='.filter_var(urlencode(rtrim($currentPath, '/')),FILTER_SANITIZE_URL).'">'.htmlspecialchars($part,ENT_QUOTES). '</a>';
        }
    }
    return $breadcrumb;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fall manager</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/lala.css">
</head>
<body><div  class="container">
    <h1> fill manager</h1>
    <!-- فرم ایجاد فایل یا فولدر -->
     <form action="./fileopersions.php" method="post"  class="creat-form" >
        <input type="text" name="new_fill_name" placeholder="Enter file or folder name">
        <select name="type" id="">
        <option  value="file"> file</option>
        <option value="folder">folder</option>
        <!-- برای استفاده از مقادیر فیلد های ذخیره شده -->
        <input type="hidden" name="current_dir" value="<?php echo  htmlspecialchars(isset($_GET['dir'])?$_GET['dir']:'') ?>">
        <button type="submit" name="create"> create</button>
        </select>
     </form>
     <!-- دکمه بازگشت-->
      <?php
      if(isset($_GET['dir'])):?>
    <a href="index.php?dir=<?php echo urldecode(dirname($_GET['dir']));?>">Back </a>
      <?php endif; ?>
      <h2> fill and folder  </h2>
      <div class ='readcrumb' >
      <!-- برای نمایش مسیر جاری کاربر -->
      <?php echo "curnet dirctory : ".getBreadcrumb (isset($_GET['dir'])? $_GET['dir']:'') ; ?>
      
      </div>
      <form action="bluk-action.php" method="post" class="">
        <ul>
         <!--  برای نمایش فایل ها و فولدر ها -->
         <?php foreach($files as $file): ?>
         <?php if ($file=='.' || $file=='..') continue ;
       $file_path = $directory . '/' . $file;
    //   اگر فولدر بود نشان می دهد مگرنه نشان می دهد
       $is_dir=is_dir($file_path);
       // اگر صخیح بود نشان ندهد اما اگر فایل نبود نشان می دهد
      $details= $is_dir ? '': getFilleDetails($file_path);
      ?>
      <li>
        <!-- تیک زدن فایل ها و فولدر ها -->
        <input  type="checkbox" name="selected_files[]" value="<?php echo htmlspecialchars($file); ?>">
    
        <?php if($is_dir): ?>
            <!-- لینک به فولدر ها -->-
             <a  href="index.php?dir=<?php echo urlencode(isset($_GET['dir'])? $_GET['dir'].'/'.$file:$file); ?>">📁<?php echo htmlspecialchars($file);?></a>
             <!-- لینک به فایل ها -->
              <?php else:?>
              <a href="view_file.php?file=<?php echo urlencode(isset($_GET['dir'])? $_GET['dir'].'/'.$file: $file); ?>">📄<?php echo htmlspecialchars($file);?></a>
             <span class="kam">(size :<?php echo $details['size']; ?>, modified :<?php echo $details['modified']; ?>)</span>
             <?php endif;?>
             <!-- تعویض نام فایل و فولدر -->
             <div  class="fill-action">
                 <!-- دریافت مشخصات فایل -->
             <a href="rename.php?file=<?php echo urlencode(isset($_GET['dir']) ? $_GET['dir'].'/'.$file : $file); ?>&dir=<?php echo urlencode(isset($_GET['dir']) ? $_GET['dir'] : '');?>">Rename</a>
             <a href="delete.php ?file=<?php echo urlencode(isset( $_GET['dir'])?$_GET['dir'].'/'.$file:$file);?>&dir=<?php echo urlencode(isset($_GET['dir'])? $_GET['dir']:'');?>">Delete</a>
             <a href="download.php ?file=<?php echo urlencode(isset( $_GET['dir'])?$_GET['dir'].'/'.$file:$file);?>&dir='<?php echo urlencode(isset($_GET['dir'])? $_GET['dir']:'');?>">Download</a>
             <a href="compress.php ?file=<?php echo urlencode(isset( $_GET['dir'])?$_GET['dir'].'/'.$file:$file);?>&dir='<?php echo urlencode(isset($_GET['dir'])? $_GET['dir']:'');?>">Comperss</a>


             </div>
             
      </li>
      <?php endforeach; ?>
            <button   type="submit" name="delete-selected">Delete</button>
        </ul>
      </form>

</div>
</body>
</html>