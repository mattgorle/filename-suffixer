# Filename Suffixer

Ensures that filenames are unique by appending a suffix to the filename.

If a file with `$filename` does not already exist, then the filename
is not changed.

### Examples

- `test_file.txt` becomes `test_file-1.txt` if a file called `test_file.txt` already exists
- `test_file.txt` is unchanged if a file called `test_file.txt` does not exist

## Installation

```bash
composer require mattgorle/filename-prefixer
```

## Usage

```php
use Gorle\FilenameSuffixer\FilenameSuffixer;

$filename = 'your_file.jpg'

$safeFilename = FilenameSuffixer::suffix($filename); 
// - your_file.jpg if the file does not already exist
// - your_file-1.jpg if your_file.jpg already exists
// - your_file-2.jpg if your_file-1.jpg already exists
// - etc...
```

## Customising behaviour

I have tried to select sensible defaults, but you can modify several parameters to suit your 
individual use case by changing the value of the static properties on `FilenameSuffixer`.

You can customise the following:

| Option | Default Value | Property |
|---|---|---|
| File extension separator | `.` | FilenameSuffixer::$extensionSeparator |
| Suffix separator | `-` | FilenameSuffixxer::$suffixSeparator |
| Path separator | `/` | FilenameSuffixer::$pathSeparator |
| Suffix starting number | `1` | FilenameSuffixer::$suffixStartsAt |

### Examples

```php
use Gorle\FilenameSuffixer\FilenameSuffixer;

FilenameSuffixer::$extensionSeparator = '_'; 
FilenameSuffixer::$pathSeparator = ':';
FilenameSuffixer::$suffixStartsAt = 31;
FilenameSuffixer::$suffixSeparator = '_';
```