<?php
$src = __DIR__ . '/images/logo (2).png';
$dst1 = __DIR__ . '/images/logo_transparent.png';
$dst2 = __DIR__ . '/images/logo_dark_header.png';
$dst3 = __DIR__ . '/images/logo.png';

if (file_exists($src)) {
    @copy($src, $dst1);
    @copy($src, $dst2);
    @copy($src, $dst3);
    echo "Copied logo (2).png directly to all logo files!";
}
?>
