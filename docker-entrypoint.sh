#!/bin/sh

composer install --optimize-autoloader --no-dev
cp /app/vendor /var/www/html/vendor -R
cp /app/bootstrap/cache /var/www/html/bootstrap/cache -R
if [ ! -f /var/www/html/database/sqlite/easyshortener.db ]; then
    touch /var/www/html/database/sqlite/easyshortener.db
fi
chown -R www-data: /var/www/html/database/sqlite

cd /var/www/html
php artisan key:generate


echo "Starting Migrations..."
php artisan migrate --force --no-interaction

echo "Clearing caches..."
php artisan config:cache --no-interaction
php artisan view:cache --no-interaction
chmod -R 777 storage/logs/laravel.log

php-fpm -D && nginx -g 'daemon off;'
