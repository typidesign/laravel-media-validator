# Add validation rules for audio and videos files.

This package gives your Laravel app a validator for audio and video files based on the information returned by ffprobe, wich is part of the FFmpeg project.

## Why this package?

Because symfony’s MIME types guessing is often not reliable, especially for audio files (see https://github.com/symfony/symfony/issues/8678).

## Installation

First install ffmpeg:
- On Debian/Ubuntu, run ```sudo apt install ffmpeg```
- On macOS with Homebrew: ```brew install ffmpeg```

Then you can install the package via composer:

```bash
composer require typidesign/laravel-media-validator
```

## Usage

In your controller or anywhere you validate your data, add this rule:

```php
$request->validate([
    'audio' => [
        new IsAudio(['mp3', 'aac']),
        // …
    ],
]);
```

or this, for videos:

```php
$request->validate([
    'audio' => [
        new IsVideo(['h264', 'theora']),
        // …
    ],
]);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email samuel@typidesign.be instead of using the issue tracker.

## Credits

- [Samuel De Backer](https://github.com/sdebacker)
- [All Contributors](../../contributors)

## About Typi Design

Typi Design is a webdesign agency based in Brussels, Belgium.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
