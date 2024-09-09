<?php

function collectImages($uploads, $backup) {
    if (!file_exists($backup)) {
        if (!mkdir($backup));
    }
    $images = [];
    $allowedExtensions = ['png', 'jpg', 'jpeg', 'webp'];

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($uploads, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $extension = strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
            if (in_array($extension, $allowedExtensions)) {
                $images[] = $file->getPathname();
            }
        }
    }
    sort($images);

    
    foreach ($images as $image) {
        $destination = $backup . '/' . basename($image);
        if (!file_exists($destination)) {
            if (!copy($image, $destination)) {
                error_log("Failed to copy: $image to $destination");
                echo "Failed to copy: $image\n";
            } else {
                echo "Copied: $image to $destination\n";
            }
        } else {
            echo "File already exists: $destination\n";
        }
    }
}

$uploadsDir = 'uploads'; 
$backupDir = 'backup'; 

collectImages($uploadsDir, $backupDir);

?>
