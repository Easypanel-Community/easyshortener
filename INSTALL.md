# Installation
## Selfhost Setup
### :gear: Configuration 
1. Open the `.env.example` file
2. Rename the `.env.example` to `.env`
3. Configure the `DATABASE_URL` - connection: `mysql://user:password@database_host:port/database_table`
4. Configure the `DB_CONNECTION`
5. Set it to `mysql`
6. Remove the `DB_HOST` `DB_PORT` `DB_DATABASE` `DB_USERNAME` `DB_PASSWORD` variables
7. Configure the `APP_ENV` - set it to `production`
8. Configure the `APP_KEY` - run `php artisan key:generate` and copy the output for your `APP_KEY`
9. Set `APP_DEBUG` to `false`
10. Set `FORCE_HTTPS` to `true` if you are using SSL
11. Set the `APP_URL` and `ASSET_URL` to your Easyshortener URL
12. Set `EASYSHORTENER_ALLOW_REGISTRATION` to `true`
13. Set `EASYSHORTENER_ALLOW_ANALYTICS` to false if you don't want to use analytics
14. Set `EASYSHORTENER_INSTALLATION_ENV` to `webhost`
## 🚤 Installation
1. Run `composer install` to install required packages
2. Run `php artisan migrate` to migrate the database
3. If local, run `php artisan serve` too
4.  Visit `http/https://your-easyshortener-instance.tld` or for local `http://localhost:8000`

:bulb: If you need to configure MAIL to reset your account password please check the [laravel documentation](https://laravel.com/docs/10.x/mail)

## Docker Setup
### :gear: Configuration
1. Configure the `DATABASE_URL` - connection: `mysql://user:password@database_host:port/database_table`
2. Configure the `DB_CONNECTION`
3. Set it to `mysql`
4. Remove the `DB_HOST` `DB_PORT` `DB_DATABASE` `DB_USERNAME` `DB_PASSWORD` variables
5. Configure the `APP_ENV` - set it to `production`
6. Configure the `APP_KEY` - run `php artisan key:generate` and copy the output for your `APP_KEY`
7. Set `APP_DEBUG` to `false`
8. Set `FORCE_HTTPS` to `true` if you are using SSL
9. Set the `APP_URL` and `ASSET_URL` to your Easyshortener URL
10. Set `EASYSHORTENER_ALLOW_REGISTRATION` to `true`
11. Set `EASYSHORTENER_ALLOW_ANALYTICS` to false if you don't want to use analytics
12. Set `EASYSHORTENER_INSTALLATION_ENV` to `docker`
## 🚤 Installation
Run `docker compose up`

## Gitpod setup
### :gear: Configuration
1. Open [https://gitpod.io#snapshot/bef448f4-541b-41b5-a5a7-daa545f26171](https://gitpod.io#snapshot/bef448f4-541b-41b5-a5a7-daa545f26171)
2. Configure the ASSET_URL & APP_URL to your Easyshortener URL
3. Set FORCE_HTTPS to `true`
4. Run `php artisan serve`
5. Login with `admin@admin.com:password` - If this doesn't work, create a new one with php artisan make:filament-user


:bulb: Make sure you use `@admin.com`

---
If you have any questions, problems, whatever, feel free to open an issue!
