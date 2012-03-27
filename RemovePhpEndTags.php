<?php

if ($argc == 2) {
    $path = $argv[1];
} else {
    $path = '.';
}

// find all .php files recursively
$files = array();

$Directory = new RecursiveDirectoryIterator($path);
$Iterator = new RecursiveIteratorIterator($Directory);
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
foreach ($Regex as $r) {
    $files[] = $r[0];
}

echo "Starting to process ".count($files)." files.\n";

foreach ($files as $file) {
    $content = file_get_contents($file);

    // if there are no end tags, don't do anything
    if (strpos($content, '?>') === false) {
        echo "skipping because there are no end tag: $file\n";
        continue;
    }

    preg_match_all('/\?\>/', $content, $matches);
    if (count($matches[0]) > 1) {
        echo "skipping because of >1 end tags found, maybe not a php-only file: $file\n";
        continue;
    }

    $newContent = rtrim($content);
    $newContent = preg_replace('/\?\>$/', '', $newContent, -1, $count);
    if ($count == 1) {
        $newContent = rtrim($newContent);
        $newContent .= "\n";

        file_put_contents($file, $newContent);

        echo "fixed file: $file\n";
        continue;
    } else {
        echo "skipping because the end tag is not at the end of the file: $file\n";
        continue;
    }
}
