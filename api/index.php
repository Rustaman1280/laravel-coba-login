<?php

// Bootstrap Laravel for Vercel PHP runtime

// Vercel sets the working directory to project root; adjust paths accordingly
$root = __DIR__ . '/../';

// Ensure required server variables
$_SERVER['DOCUMENT_ROOT'] = $root . 'public';
$_SERVER['SCRIPT_FILENAME'] = $root . 'public/index.php';
$_SERVER['SCRIPT_NAME'] = '/index.php';

// Trust X-Forwarded headers on Vercel
$_SERVER['HTTPS'] = 'on';
$_SERVER['HTTP_X_FORWARDED_PROTO'] = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? 'https';

// Use /tmp for compiled views to avoid write errors
if (!getenv('VIEW_COMPILED_PATH')) {
    putenv('VIEW_COMPILED_PATH=/tmp');
}

// If using SQLite (default in this app), move DB to /tmp for read/write
$useSqlite = getenv('DB_CONNECTION') === false || getenv('DB_CONNECTION') === 'sqlite';
if ($useSqlite) {
    $src = $root . 'database/database.sqlite';
    $dst = '/tmp/database.sqlite';
    if (is_file($src)) {
        if (!is_file($dst)) {
            @copy($src, $dst);
        }
        // Point Laravel to the /tmp database
        putenv('DB_CONNECTION=sqlite');
        putenv('DB_DATABASE=' . $dst);
    }
}

require $root . 'public/index.php';
