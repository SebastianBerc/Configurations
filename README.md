# Configurations

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sebastian-berc/Configurations.svg?style=flat-square)](https://packagist.org/packages/sebastian-berc/Configurations)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/SebastianBerc/Configurations/master.svg?style=flat-square)](https://travis-ci.org/SebastianBerc/Configurations)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/SebastianBerc/Configurations.svg?style=flat-square)](https://scrutinizer-ci.com/g/SebastianBerc/Configurations/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/SebastianBerc/Configurations.svg?style=flat-square)](https://scrutinizer-ci.com/g/SebastianBerc/Configurations)
[![Total Downloads](https://img.shields.io/packagist/dt/sebastian-berc/Configurations.svg?style=flat-square)](https://packagist.org/packages/sebastian-berc/Configurations)

## Install

Via Composer

``` bash
$ composer require sebastian-berc/configurations
```

## Usage

``` php
$config = new SebastianBerc\Configurations\File('path/to/file.yml');
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
