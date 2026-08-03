<?php
// Image Optimizer Script for Principle 1 (Safe execution check)
if (!function_exists('imagecreatefromjpeg') || !function_exists('imagecreatefrompng')) {
    return; // Exit safely if PHP GD extension is disabled in XAMPP
}

$imagesDir = __DIR__ . '/images/';
$files = glob($imagesDir . '*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);

if (!$files) return;

foreach ($files as $file) {
    $info = @getimagesize($file);
    if (!$info) continue;

    $mime = $info['mime'];
    $width = $info[0];
    $height = $info[1];

    $filename = strtolower(basename($file));

    $maxWidth = 1600;
    if (strpos($filename, 'logo') !== false) {
        $maxWidth = 600;
    } elseif (strpos($filename, 'nikhil') !== false || strpos($filename, 'george') !== false || strpos($filename, 'boss') !== false) {
        $maxWidth = 600;
    }

    $newWidth = $width;
    $newHeight = $height;

    if ($width > $maxWidth) {
        $newWidth = $maxWidth;
        $newHeight = (int)(($height / $width) * $maxWidth);
    }

    if ($mime === 'image/jpeg' && function_exists('imagecreatefromjpeg')) {
        $srcImg = @imagecreatefromjpeg($file);
        if ($srcImg) {
            $dstImg = @imagecreatetruecolor($newWidth, $newHeight);
            if ($dstImg) {
                @imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                @imagejpeg($dstImg, $file, 75);
                @imagedestroy($dstImg);
            }
            @imagedestroy($srcImg);
        }
    } elseif ($mime === 'image/png' && function_exists('imagecreatefrompng')) {
        $srcImg = @imagecreatefrompng($file);
        if ($srcImg) {
            $dstImg = @imagecreatetruecolor($newWidth, $newHeight);
            if ($dstImg) {
                @imagealphablending($dstImg, false);
                @imagesavealpha($dstImg, true);
                @imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                @imagepng($dstImg, $file, 8);
                @imagedestroy($dstImg);
            }
            @imagedestroy($srcImg);
        }
    }
}
?>
