<p align="center">
Easyshortener
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
- Set `EASYSHORTENER_ALLOW_REGISTRATION` to `true` to create your account - run `php artisan config:cache` once done
- `npm run build` - Builds assets

## Testing

- `php artisan test` - Running this will refresh the entire database
- `php artisan db:seed` - This creates a user called `User` with the credentials `user@test.com:password`

## License

Easyshortener is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

⚠ The following below is NOT available yet and is filled in advance.

## Commands
 Command | Description | Arguments 
---------|-------------|-----------
 php artisan view:link | View all links | None
 php artisan delete:link | Delete a link | ID
 
 ## Environment Variables
  Variable | Description | Arguments 
 ---------|-------------|-----------
 EASYSHORTENER_ALLOW_REGISTRATION | Allow registration | true/false
 EASYSHORTENER_INSTALLATION_ENV | Install Platform | easypanel/docker/webhost
