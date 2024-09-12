<?php


if (isset($_POST['create'])) {
    $name  = $_POST['new_fill_name'];
    $type = $_POST['type'];
    $current_dir = isset($_POST['current_dir']) ? $_POST['current_dir'] : '';
    $path = './uploads' . $current_dir . '/' . $name;

    // Check if the file or folder already exists
    if (file_exists($path)) {
        // Get the file or folder name without extension
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $extension = pathinfo($name, PATHINFO_EXTENSION);

        // Initialize a counter
        $counter = 1;

        // Loop until a unique name is found
        while (file_exists($path)) {
            // Add the counter to the filename
            $new_name = $filename . " ($counter)";
            if ($extension) {
                $new_name .= "." . $extension;
            }
            $path = './uploads' . $current_dir . '/' . $new_name;
            $counter++;
        }

    
        $name = $new_name;
    }

    // Create the file or folder
    if ($type == 'file') {
        fopen($path, 'w');
    } else if ($type == 'folder') {
        mkdir($path);
    }

    // Redirect to the index.php page
    header('location:index.php?dir=' . urlencode($current_dir));
    exit();
}

?>