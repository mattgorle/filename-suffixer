#!/usr/bin/env php
<?php

use Gorle\FilenameSuffixer\FilenameSuffixer;

require_once __DIR__ . '/vendor/autoload.php';

$filename = $argv[1] ?? '';

if ($filename === '') {
    exit('Error: no filename specified');
}

printf('%s => %s%s', $filename, FilenameSuffixer::suffix($filename), PHP_EOL);