<?php
if(isset($_POST['delete-selected'])){ 
$file_to_delete = $_POST['selected_files'];
foreach($file_to_delete as $file){
$fle_path='./uploads/'.$file;
if(is_file($fle_path)){
    unlink($fle_path);
}else{
    rmdir($fle_path);
}
}

}

$redirect_url = 'index.php';
if (isset($_GET['dir']) && filter_var($_GET['dir'], FILTER_SANITIZE_URL)) {
    $redirect_url .= '?dir=' . urlencode($_GET['dir']);
}


 // exit to prevent further execution of the script

header("Location:$redirect_url"); 

exit();



?>