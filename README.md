# Aribrake Laravel Package
[![Latest Stable Version](https://poser.pugx.org/rigor789/airbrake-laravel/v/stable.svg)](https://packagist.org/packages/rigor789/airbrake-laravel) [![Total Downloads](https://poser.pugx.org/rigor789/airbrake-laravel/downloads.svg)](https://packagist.org/packages/rigor789/airbrake-laravel) [![Latest Unstable Version](https://poser.pugx.org/rigor789/airbrake-laravel/v/unstable.svg)](https://packagist.org/packages/rigor789/airbrake-laravel) [![License](https://poser.pugx.org/rigor789/airbrake-laravel/license.svg)](https://packagist.org/packages/rigor789/airbrake-laravel)

This is a Laravel package for utilizing [Airbrake API](https://github.com/airbrake/airbrake-php) to collect errors.

It Supports [ErrBit](https://github.com/errbit/errbit) just change the host in the config.

# Install

First pull in the packages as a dependency

```
composer require rigor789/airbrake-laravel 
```

Then add the ServiceProvider to your ``` config/app.php ```

```php

    ...
    'providers' => [
  
        ...
        'rigor789\AirbrakeLaravel\AirbrakeServiceProvider',
        ...

    ],
    ...
  
```

Enable error reporting in the config, and customize it as you want. You are good to go!

# Issues

If you find any issues, submit a report [here](https://github.com/rigor789/airbrake-laravel/issues)

# Contributing

If you want to contribute, just submit a [pull request](https://github.com/rigor789/airbrake-laravel/pulls).

# License

Licensed under the MIT license. See the [LICENSE](https://github.com/rigor789/airbrake-laravel/blob/master/LICENSE) file for details.