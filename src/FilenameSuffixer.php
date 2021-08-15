<?php


namespace Gorle\FilenameSuffixer;


use function array_pop;
use function explode;
use function file_exists;
use function implode;
use function stristr;
use function strlen;
use function trim;

class FilenameSuffixer
{
    public static $extensionSeparator = '.';
    public static $suffixSeparator    = '-';
    public static $suffixStartsAt     = 1;
    public static $pathSeparator      = '/';

    public static function suffix($filename, $path = '')
    {
        $filepath = static::buildFilePath($filename, $path);

        if (!file_exists($filepath)) {
            return $filename;
        }

        $currentSuffix = static::$suffixStartsAt;

        while (file_exists($filepath)) {
            $suffixedFilename = static::appendSuffix($filename, $currentSuffix);
            $filepath = static::buildFilePath($suffixedFilename, $path);
            $currentSuffix++;
        }

        return $suffixedFilename;
    }

    protected static function buildFilePath(string $filename, string $path = null)
    {
        if (strlen(trim($path)) === 0) {
            return $filename;
        }

        return $path . static::$pathSeparator . $filename;
    }

    protected static function appendSuffix(string $filename, int $suffix)
    {
        $basename = $filename;

        if (stristr($filename, static::$extensionSeparator) !== false) {
            $parts = explode(static::$extensionSeparator, $filename);
            $extension = array_pop($parts);
            $basename = implode(static::$extensionSeparator, $parts);

            return $basename . static::$suffixSeparator . $suffix . static::$extensionSeparator . $extension;
        }

        return $basename . static::$suffixSeparator . $suffix;
    }
}