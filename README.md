# Multisignup

Prevent multiple signups from IP in Laravel.

## Installation

You can install the package via composer:

```bash
composer require devworkout/multisignup
```

Migrate the database:
```bash
php artisan migrate
```

Publish config:
```bash
php artisan vendor:publish
```

Default settings:
```php

return [
    'max_signups_from_ip' => 1,
];

```


## Usage

### Using Facade

``` php

$canSignup = MultiSignup::ipReachedMaxSignups();

// or 
$canSignup = MultiSignup::hasNosignupCookie();

// or both
$canSignup = MultiSignup::canSignUp();

// manually prevent signups
$canSignup = MultiSignup::setNosignupCookie();

```

### Using Middleware

In your Http\Kernel:
```php

    protected $routeMiddleware = [
        //...
        'prevent-multiple-signups' => \DevWorkout\MultiSignup\Http\Middleware\PreventMultipleSignups::class,
    ];
    
```

In your RegisterController:
```php

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('prevent-multiple-signups');
    }
    
```

### Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email us instead of using the issue tracker.

## Credits

- [devworkout](https://github.com/devworkout)
- [All Contributors](../../contributors)

## Support us

Give us a star!

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
