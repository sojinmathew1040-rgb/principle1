<?php
// Ensure logo.svg is copied/synced
$svg = __DIR__ . '/images/logo.svg';
if (file_exists($svg)) {
    @copy($svg, __DIR__ . '/images/logo_clean.svg');
}
?>
