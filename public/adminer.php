<?php
// Dev helper: download Adminer once and include it so you can open /adminer.php
$local = __DIR__ . '/adminer-full.php';
if (!file_exists($local)) {
    // Try to download the latest Adminer from the official site.
    // This will only run the first time the file is requested.
    $remote = 'https://www.adminer.org/latest.php';
    @copy($remote, $local);
}
if (file_exists($local)) {
    require $local;
} else {
    http_response_code(500);
    echo 'Could not download Adminer. If you are offline, download https://www.adminer.org/latest.php into public/adminer-full.php';
}
