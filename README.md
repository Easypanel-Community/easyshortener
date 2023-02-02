<p align="center">
Easyshortner
</a></p>

<!--
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

-->

## Installation

- `composer install` - Installs dependencies to last updated version
- `php artisan migrate` - Migrates the database
- Set `EASYSHORTNER_ALLOW_REGISTRATION` to `true` to create your account - run `php artisan config:cache` once done

## Testing

- `php artisan test` - Running this will refresh the entire database
- `php artisan db:seed` - This creates a user called `User` with the credentials `user@test.com:password`

## License

Easyshortner is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
