<?php
$cmd1 = 'python "c:\\xampp\\htdocs\\principle1\\process_checkerboard.py" 2>&1';
$cmd2 = 'py "c:\\xampp\\htdocs\\principle1\\process_checkerboard.py" 2>&1';
$out1 = shell_exec($cmd1);
$out2 = shell_exec($cmd2);

// Also run GD fallback directly inside PHP
$inputPath = __DIR__ . '/images/logo (2).png';
if (file_exists($inputPath) && function_exists('imagecreatefrompng')) {
    $src = @imagecreatefrompng($inputPath);
    if ($src) {
        $w = imagesx($src);
        $h = imagesy($src);
        $dst = imagecreatetruecolor($w, $h);
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
        $trans = imagecolorallocatealpha($dst, 0, 0, 0, 127);
        imagefilledrectangle($dst, 0, 0, $w, $h, $trans);

        for ($x = 0; $x < $w; $x++) {
            for ($y = 0; $y < $h; $y++) {
                $rgba = imagecolorat($src, $x, $y);
                $r = ($rgba >> 16) & 0xFF;
                $g = ($rgba >> 8) & 0xFF;
                $b = $rgba & 0xFF;
                $a = ($rgba >> 24) & 0x7F;

                $isGreySquare = (abs($r - $g) <= 6 && abs($g - $b) <= 6) && ($r >= 195 && $r <= 225);
                $isLightSquare = (abs($r - $g) <= 6 && abs($g - $b) <= 6) && ($r >= 226 && $r <= 248);

                if ($isGreySquare || $isLightSquare) {
                    imagesetpixel($dst, $x, $y, $trans);
                } else {
                    $col = imagecolorallocatealpha($dst, $r, $g, $b, $a);
                    imagesetpixel($dst, $x, $y, $col);
                }
            }
        }
        imagepng($dst, __DIR__ . '/images/logo_transparent.png');
        imagepng($dst, __DIR__ . '/images/logo_clean.png');
        imagepng($dst, __DIR__ . '/images/logo (2).png');
        imagedestroy($src);
        imagedestroy($dst);
    }
}
?>
