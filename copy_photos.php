<?php
$src = "C:/Users/sojin/.gemini/antigravity-ide/brain/752f8532-d208-46aa-9f9f-61809b051dde/executive_skyline_bg_1785728823702.png";
$dst1 = __DIR__ . "/images/executive_skyline_bg.png";
$dst2 = __DIR__ . "/images/hero_bg.png";

if (file_exists($src)) {
    @copy($src, $dst1);
    @copy($src, $dst2);
}
@include_once __DIR__ . '/optimize_images.php';
@include_once __DIR__ . '/run_convert.php';
?>
