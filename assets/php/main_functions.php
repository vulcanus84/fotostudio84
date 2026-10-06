<?php

function galleryImages(string $dir, string $webDir): array {
    if (!is_dir($dir)) return [];
    $allowed = ['jpg','jpeg','png','webp','avif'];
    $files = array_filter(scandir($dir), function ($file) use ($dir, $allowed) {
        if ($file === '.' || $file === '..' || str_starts_with($file, '.')) return false;
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        return in_array($ext, $allowed, true) && is_file($dir . '/' . $file);
    });
    natcasesort($files);
    return array_map(fn($file) => $webDir . '/' . rawurlencode($file), array_values($files));
}

?>