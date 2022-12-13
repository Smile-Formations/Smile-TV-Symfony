<?php

$path = dirname(__DIR__);
$destination = __DIR__;
$dirs = scandir($path);
$excepts = ['.', '..', 'assets'];

foreach ($dirs as $dir) {
    $full = $path . '/' . $dir;
    if (!in_array($dir, $excepts, true) && is_dir($full)) {
        $concurrentDirectory = $destination . '/' . $dir;
        if (!mkdir($concurrentDirectory) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        echo "- " . $concurrentDirectory . "\n";
        $files = scandir($full);
        foreach ($files as $file) {
            if (!in_array($file, $excepts, true) && is_file($full . '/' . $file)) {
                $concurrentDirectory2 = $destination . '/' . $dir . '/' . str_replace('.md', '', $file);
                if (str_ends_with($file, '.md') && !mkdir($concurrentDirectory2) && !is_dir($concurrentDirectory2)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory2));
                }
                fopen($concurrentDirectory2 . "/.gitignore", 'wb');
                echo "\t" . "-- " . $concurrentDirectory2 . "\n";
            }
        }
    }
}

echo "\nDone !";