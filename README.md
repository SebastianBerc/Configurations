# Configurations

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sebastian-berc/Configurations.svg?style=flat-square)](https://packagist.org/packages/sebastian-berc/Configurations)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/SebastianBerc/Configurations/master.svg?style=flat-square)](https://travis-ci.org/SebastianBerc/Configurations)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/SebastianBerc/Configurations.svg?style=flat-square)](https://scrutinizer-ci.com/g/SebastianBerc/Configurations/code-structure)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/8fa2d158-785c-4010-97da-38886afdb064.svg?style=flat-square)](https://insight.sensiolabs.com/projects/8fa2d158-785c-4010-97da-38886afdb064)
[![Quality Score](https://img.shields.io/scrutinizer/g/SebastianBerc/Configurations.svg?style=flat-square)](https://scrutinizer-ci.com/g/SebastianBerc/Configurations)
[![Total Downloads](https://img.shields.io/packagist/dt/sebastian-berc/Configurations.svg?style=flat-square)](https://packagist.org/packages/sebastian-berc/Configurations)

## Install

Via Composer

``` bash
$ composer require sebastian-berc/configurations
```

## Usage

``` php
$config = new SebastianBerc\Configurations\Config('path/to/file.yml');
echo $config->get('hello.world');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email contact@sebastian-berc.pl instead of using the issue tracker.

## Credits

- [Sebastian Berć](https://github.com/SebastianBerc)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
