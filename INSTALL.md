
## Selfhost Setup
### ⚙ Configuration 
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
14. Set `EASYSHORTENER_INSTALLATION_ENV` to `webhost` \
💡 If you need to configure MAIL to reset your account password please check the [laravel documentation](https://laravel.com/docs/10.x/mail)
## 🚤 Installation
1. Run `php artisan migrate` to migrate the database
2. If local, run `php artisan serve` too
3.  Visit `http/https://your-easyshortener-instance.tld` or for local `http://localhost:8000`
