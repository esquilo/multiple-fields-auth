# MultipleFieldsAuth

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

In Laravel we can choose what field is going to be the username on the authentication process, but It is only possible to choose one field on the users table. This package provides a method of authentication using multiple fields.

## Install

Via Composer

``` bash
$ composer require esquilo/multiple-fields-auth
```

Then add the service provider in config/app.php:

``` php
esquilo\MultipleFieldsAuth\MultipleFieldsAuthServiceProvider::class,
```


## Usage

``` php
namespace App\Http\Controllers\Auth;

...
use esquilo\MultipleFieldsAuth\MultipleFieldsAuth;

class LoginController extends Controller
{
    use MultipleFieldsAuthTrait;

    protected $usernameFields = ['field1', 'field2', 'field3'];
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email ricardorichsn@gmail.com instead of using the issue tracker.

## Credits

- [Ricardo da Silva Nunes][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/esquilo/multiple-fields-auth.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/esquilo/multiple-fields-auth.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/esquilo/multiple-fields-auth
[link-downloads]: https://packagist.org/packages/esquilo/multiple-fields-auth
[link-author]: https://github.com/esquilo
[link-contributors]: ../../contributors
