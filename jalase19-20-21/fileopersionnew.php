<?php
if(isset($_POST['create'])) {
    $name  = $_POST['new_fill_name'];
    $type = $_POST['type'];
    $current_dir = isset($_POST['current_dir'])? $_POST['current_dir'] : '';
    $path = '/uploads'.$current_dir.'/';
// تابعی برای اضافه شدن شماره به انتهای نام فایل یا پوشه
function getuniquename($path, $name, $type) {
  $orginalName=$name; 
  $cunter=1;
  while(file_exists(filename:$path.$name.$type)) {
    $name=$orginalName.'('.$cunter.')';
    $cunter++;
  }


}
return $name;
// به دست آوردن نام بونیک
$uniqueName = getuniquename($path, $name, $type);$fullpath = $path.$uniqueName;
if($type == 'file') {
    fopen(filename: $fullpath, mode: 'w');
} else {
    mkdir(directory:$fullpath);
}

header("location: index.php?dir=.".urlencode($current_dir)); 
exit();

}
?>