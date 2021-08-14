<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Gorle\FilenameSuffixer\FilenameSuffixer;

$expectedFilename = 'suffixer_test-1.php';

if (assert(FilenameSuffixer::suffix(__FILE__) === $expectedFilename)) {
    printf ("[PASS]: Filename has been correctly deconflicted (%s => %s)\n", __FILE__, $expectedFilename);
} else {
    print "[FAIL]: Filename has not been correctly deconflicted\n";
}