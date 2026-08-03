<?php
$inputPath = __DIR__ . '/images/logo (2).png';
if (!file_exists($inputPath)) {
    exit("Input logo file not found.");
}

if (!function_exists('imagecreatefrompng')) {
    // Fallback: copy directly
    @copy($inputPath, __DIR__ . '/images/logo_transparent.png');
    @copy($inputPath, __DIR__ . '/images/logo.png');
    exit("GD not enabled, copied directly.");
}

$src = @imagecreatefrompng($inputPath);
if (!$src) {
    @copy($inputPath, __DIR__ . '/images/logo_transparent.png');
    @copy($inputPath, __DIR__ . '/images/logo.png');
    exit("Failed to create image from PNG, copied directly.");
}

$w = imagesx($src);
$h = imagesy($src);

$dst = imagecreatetruecolor($w, $h);
imagealphablending($dst, false);
imagesavealpha($dst, true);
$transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
imagefilledrectangle($dst, 0, 0, $w, $h, $transparent);

for ($x = 0; $x < $w; $x++) {
    for ($y = 0; $y < $h; $y++) {
        $rgba = imagecolorat($src, $x, $y);
        $r = ($rgba >> 16) & 0xFF;
        $g = ($rgba >> 8) & 0xFF;
        $b = $rgba & 0xFF;
        $a = ($rgba >> 24) & 0x7F;

        // Check if pixel is part of the checkerboard background (grey/off-white squares)
        $isCheckerboard = (abs($r - $g) <= 8 && abs($g - $b) <= 8 && abs($r - $b) <= 8) && ($r >= 180 && $r <= 245);

        if ($isCheckerboard) {
            imagesetpixel($dst, $x, $y, $transparent);
        } else {
            $col = imagecolorallocatealpha($dst, $r, $g, $b, $a);
            imagesetpixel($dst, $x, $y, $col);
        }
    }
}

imagepng($dst, __DIR__ . '/images/logo_transparent.png');
imagepng($dst, __DIR__ . '/images/logo_dark_header.png');
imagepng($dst, __DIR__ . '/images/logo.png');
imagedestroy($src);
imagedestroy($dst);
echo "Successfully created transparent logo using PHP GD!";
