# Noty notification package for Laravel

<p align="center">
  <a href="https://travis-ci.org/milanarandjelovic/noty"><img src="https://travis-ci.org/milanarandjelovic/noty.svg?branch=master"></a>
  <a href="https://packagist.org/packages/milanarandjelovic/noty"><img src="https://poser.pugx.org/milanarandjelovic/noty/v/stable.svg?format=flat" alt="Latest Stable Release"></a>
  <a href="https://packagist.org/packages/milanarandjelovic/noty"><img src="https://poser.pugx.org/milanarandjelovic/noty/v/unstable.svg?format=flat" alt="Latest Unstable Release"></a>
  <a href="https://packagist.org/packages/milanarandjelovic/noty"><img src="https://poser.pugx.org/milanarandjelovic/noty/license.svg?format=flat" alt="License"></a>
  <a href="https://packagist.org/packages/milanarandjelovic/noty"><img src="https://poser.pugx.org/milanarandjelovic/noty/downloads.svg?format=flat" alt="Total Downloads"></a>
</p>

## Installation Steps

### Require the package
After create your new Laravel application you can include Noty package with following comand:
```bash
composer require milanarandjelovic/noty
```

### Add Provider and Alias
Add Provider and Alias inside of your `config/app.php`.
```php
'providers' => [
    // other providers
    MA\Noty\NotyServiceProvider::class,
]

'aliases' => [
    // other aliases
    'Noty' => MA\Noty\Facades\Noty::class,
]
```

### Publish config and assets
As optional if you want to modify the default configuration, you can publish the configuration file:
```bash
php artisan vendor:publish --provider="MA\Noty\NotyServiceProvider" --tag="config"
php artisan vendor:publish --provider="MA\Noty\NotyServiceProvider" --tag="public" --force
```

## Usage
Include Noty assets and styles in your main view template:
```php
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @noty_styles
    </head>
    <body>

        <h1>Main view</h1>

        @noty_scripts
        @noty_render
    </body>
</html>
```

***Example:***
```php
 noty()->info('Info Message', 'Info')
       ->success('Success Message', 'Success')
       ->error('Error Message', 'Error')
       ->warning('Warning Message', 'Warning');
```

## License
The Noty is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
