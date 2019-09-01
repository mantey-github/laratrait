# Laratrait

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Total Downloads][ico-downloads]][link-downloads]

Laratrait is an easy way to add traits (trait folder and trait stub) to your laravel projects, using the artisan command ``` php artisan laratrait:trait TraitName ```

## Installation

To install via Composer run the command from your terminal:

``` bash
$ composer require mantey/laratrait
```

## Usage

The command below should show ```make:trait``` as one of the artisan commands after installation.

``` bash
$ php artisan
```

To make a trait just run the command below. `TraitName`, being the name of your trait.

``` bash
$ php artisan make:trait TraitName
```

To specify the path for the trait use the option `--path` and the`--func` option adds a function to your trait.

``` bash
$ php artisan make:trait TraitName --path=pathName --func=functionName
```

To generate traits with multiple functions.

``` bash
$ php artisan make:trait TraitName --func=foo,bar,foobar
```

## Contributing

Please report any issue you find in the issues page. Pull requests are always welcome.

## License

Laratrait is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

[ico-version]: https://img.shields.io/packagist/v/mantey/laratrait.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mantey/laratrait.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mantey/laratrait
[link-downloads]: https://packagist.org/packages/mantey/laratrait
[link-author]: https://github.com/mantey-github
