<?php
$src = 'C:/Users/sojin/Downloads/principle1/logo.jpeg';
$dir = __DIR__ . '/images';
$dest = $dir . '/logo.jpeg';

if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

if (file_exists($src)) {
    if (copy($src, $dest)) {
        echo "SUCCESS: Logo copied to " . $dest;
    } else {
        echo "ERROR: Failed to copy file.";
    }
} else {
    echo "ERROR: Source file does not exist at " . $src;
}
?>
