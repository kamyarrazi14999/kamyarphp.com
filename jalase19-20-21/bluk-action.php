<?php

if (isset($_POST['delete-selected']) && !empty($_POST['selected_files'])) {
    $selected_files = array_map('trim', $_POST['selected_files']);
    $selected_files = array_filter($selected_files, 'strlen');

    foreach ($selected_files as $file) {
        $file_path = './uploads/' . $file;
        if (is_file($file_path)) {
            unlink($file_path);
        } elseif (is_dir($file_path)) {
            deleteDir($file_path);
        }
    }
}
function deleteDir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                $object_path = $dir . "/" . $object;
                if (is_dir($object_path)) {
                    try {
                        deleteDir($object_path); // حذف فولدر زیرمجموعه به صورت recursive
                    } catch (Exception $e) {
                        echo "خطای حذف فولدر زیرمجموعه: " . $e->getMessage() . "\n";
                    }
                } else {
                    try {
                        unlink($object_path);
                    } catch (Exception $e) {
                        echo "خطای حذف فایل: " . $e->getMessage() . "\n";
                    }
                }
            }
        }
        try {
            rmdir($dir);
        } catch (Exception $e) {
            echo "خطای حذف فولدر: " . $e->getMessage() . "\n";
        }
    }
}


$redirect_url = 'index.php';
if (isset($_GET['dir']) && filter_var($_GET['dir'], FILTER_SANITIZE_URL)) {
    $redirect_url .= '?dir=' . urlencode($_GET['dir']);
}

header("Location: $redirect_url");
exit;


?>