<?php

namespace Gorle\FilenameSuffixer;

use PHPUnit\Framework\TestCase;

class FilenameSuffixerTest extends TestCase
{
    public function setUp(): void
    {
        FilenameSuffixer::reset();
    }

    public function testSuffixCreatesASuffix()
    {
        $filename = __FILE__;

        $expectedFilename = __DIR__ . '/FilenameSuffixerTest-1.php';

        $this->assertEquals($expectedFilename, FilenameSuffixer::suffix($filename));
    }

    public function testSuffixDisregardsFilesWhichDontExist()
    {
        $filename = '/tmp/this_file_does_not_exist.txt';

        $this->assertEquals($filename, FilenameSuffixer::suffix($filename));
    }

    public function testSuffixHandlesFilesWithNoExtension()
    {
        $filename = __DIR__ . '/test_file_with_no_extension';

        $this->assertEquals($filename . '-1', FilenameSuffixer::suffix($filename));
    }

    public function testSuffixHandlesFilesInADifferentPath()
    {
        $filename = 'test_file_with_no_extension';

        $expected = 'foo';

        $this->assertEquals($filename . '-1', FilenameSuffixer::suffix($filename, __DIR__));
    }

    public function testFileExtensionSeparatorCanBeChanged()
    {
        FilenameSuffixer::$extensionSeparator = '_';

        $filename = __DIR__ . '/test_file_with_no_extension';
        $expectedFilename = __DIR__ . '/test_file_with_no-1_extension';

        $this->assertEquals($expectedFilename, FilenameSuffixer::suffix($filename));
    }

    public function testSuffixSeparatorCanBeChanged()
    {
        FilenameSuffixer::$suffixSeparator = '_';

        $filename = __DIR__ . '/test_file_with_no_extension';
        $expectedFilename = __DIR__ . '/test_file_with_no_extension_1';

        $this->assertEquals($expectedFilename, FilenameSuffixer::suffix($filename));
    }

    public function testSuffixStartAtCanBeChanged()
    {
        FilenameSuffixer::$suffixStartsAt = 45;

        $filename = __DIR__ . '/test_file_with_no_extension';
        $expectedFilename = __DIR__ . '/test_file_with_no_extension-45';

        $this->assertEquals($expectedFilename, FilenameSuffixer::suffix($filename));
    }
}
