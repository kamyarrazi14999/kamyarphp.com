<?php
if(isset($_GET['file']))
{
$file = $_GET['file'];
$file = './uploads/'.$file;
$zip = new ZipArchive();
// نام فایل فشرده
 $zip_filename = '/uploads'.pathinfo($file, PATHINFO_FILENAME).'.zip';

if($zip->open($zip_filename, ZipArchive::CREATE) !== TRUE)



{
exit("Could not open archive");
}

if(is_file($file)) {
    $zip->addFile ($file,basename($file));
}
else if (is_dir($file)) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($file), RecursiveIteratorIterator::LEAVES_ONLY);
    if($file!= $file . DIRECTORY_SEPARATOR) {
        $zip->addEmptyDir(basename($file));
    }
    foreach($files as $name => $file){
        if (!$file->isDir()){
            $filePath = $file->getRealPath();
            $relatlilvePath =
            substr($filePath,strlen($file)+1);
            $zip->addFile($filePath, $relatlilvePath);
            

        }
    }
    

}
$zip->close();
}
// برای دانلودفایل فشرده در سرور
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="'.basename($zip_filename).'"');
    header('Content-Length: ' . filesize($zip_filename));

    readfile($zip_filename);
    unlink($zip_filename);


    
    // حذف فایل فشرده پس ا دانلود
 exit();
 // اگر فایلی با این نام وجود ندارد
?>

