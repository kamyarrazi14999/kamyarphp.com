<?php
if(isset($_GET['file'])) {
    $file='./uploads/'.$_GET['file'];
    $parent_dir= isset($_GET['dir'])?$_GET['dir']:'';

if(is_dir($file)){
    deleteDirectory($file);
    
}else{
    unlink($file);
}
$redirect_url = 'index.php'.($parent_dir ? '?dir=' . urldecode($parent_dir) : '');
header("Location:$redirect_url");   
}

//  function to delete a folder

// function deleteDirectory($dir){
// if(!is_dir($dir)) {
//     return unlink($dir);
// }
// $items = array_diff(scandir($dir), array('.', '..'));
// foreach($items as $item) {
//     deleteDirectory($dir . DIRECTORY_SEPARATOR . $item);
// }
// return rmdir($dir);
// }
// function deleteDirectory($dir) {
//     if(!is_dir($dir)) {
//         return unlink($dir);
//     }
//     $items = array_diff(scandir($dir), array('.', '..'));
//     foreach($items as $item){
//         $path = $dir . DIRECTORY_SEPARATOR.$item;
//     if (is_dir($path)) {
//             deleteDirectory($path);    
//     }
//     else {
//         unlink($path);
//     }
// }
// return rmdir($dir);
// }
function deleteDirectory($dir) {
    if (!is_dir($dir)) {
        return unlink($dir);
    }

    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $path = $dir . DIRECTORY_SEPARATOR . $item;

        if (is_dir($path)) {
            deleteDirectory($path);
        } elseif (is_file($path)) {
            unlink($path);
        } elseif (is_link($path)) {
            // Handle symbolic links
            unlink($path);
        }
    }

    if (rmdir($dir) === false) {
        // Handle directory removal error
    }

    return true;
}
?>