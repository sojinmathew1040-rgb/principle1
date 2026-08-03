<?php
$inputPath = __DIR__ . '/images/logo (2).png';
$outputPath = __DIR__ . '/images/logo_exact_transparent.png';

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

                // Checkerboard background tile detection:
                // Monochrome grey/white tiles where color diff <= 5 and brightness between 185 and 248
                $isBgSquare = ($diff <= 5) && ($r >= 185 && $r <= 248);

                if ($isBgSquare) {
                    imagesetpixel($dst, $x, $y, $trans);
                } else {
                    $col = imagecolorallocatealpha($dst, $r, $g, $b, $a);
                    imagesetpixel($dst, $x, $y, $col);
                }
            }
        }
        imagepng($dst, $outputPath);
        imagepng($dst, __DIR__ . '/images/logo (2).png');
        imagepng($dst, __DIR__ . '/images/logo.png');
        imagepng($dst, __DIR__ . '/images/logo_transparent.png');
        imagedestroy($src);
        imagedestroy($dst);
    }
}
?>
