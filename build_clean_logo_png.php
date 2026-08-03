<?php
$baseDir = __DIR__ . '/images';
$inputPath = $baseDir . '/logo (2).png';
if (!file_exists($inputPath)) {
    $inputPath = $baseDir . '/logo.png';
}

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

                $maxC = max($r, max($g, $b));
                $minC = min($r, min($g, $b));
                $diff = $maxC - $minC;

                $isBgSquare = ($diff <= 6) && ($r >= 180 && $r <= 248);

                if ($isBgSquare) {
                    imagesetpixel($dst, $x, $y, $trans);
                } else {
                    $col = imagecolorallocatealpha($dst, $r, $g, $b, $a);
                    imagesetpixel($dst, $x, $y, $col);
                }
            }
        }
        imagepng($dst, $baseDir . '/logo_exact_transparent.png');
        imagepng($dst, $baseDir . '/logo_transparent.png');
        imagepng($dst, $baseDir . '/logo.png');
        imagedestroy($src);
        imagedestroy($dst);
        echo "PNG built successfully!";
    }
}
?>
