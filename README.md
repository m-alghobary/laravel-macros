# Laravel Macros

Add missing reusable functionality to Laravel through macros

## Installation

You can install the package via composer:

```bash
composer require alghobary/laravel-macros
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-macros-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-macros-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-macros-views"
```

## Usage

```php
$laravelMacros = new Alghobary\LaravelMacros();
echo $laravelMacros->echoPhrase('Hello, Alghobary!');
```

## Testing

```bash
composer test
```

## Credits

- [Mohamed Alghobary](https://github.com/m-alghobary)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
