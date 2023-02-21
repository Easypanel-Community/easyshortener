#!/bin/sh

if [ ! -f /var/www/html/database/sqlite/easyshortner.db ]; then
    touch /var/www/html/database/sqlite/easyshortner.db
fi

chown -R www-data: /var/www/html/database/sqlite

cd /var/www/html

echo "Starting Migrations..."
php artisan migrate --force

echo "Clearing caches..."
php artisan config:cache
php artisan view:cache

php-fpm -D && nginx -g 'daemon off;'
