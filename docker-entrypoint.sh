#!/bin/sh

composer() {
composer install --optimize-autoloader --no-dev
cp /app/vendor /var/www/html/vendor -R
cp /app/bootstrap/cache /var/www/html/bootstrap/cache -R
}

sqlite() {
if [ ! -f /var/www/html/database/sqlite/easyshortener.db ]; then
    touch /var/www/html/database/sqlite/easyshortener.db
fi
chown -R www-data: /var/www/html/database/sqlite

}

migrate_db() {
echo "Starting Migrations..."
php artisan migrate --force --no-interaction
}

clear_cache() {
echo "Clearing caches..."
php artisan config:cache --no-interaction
php artisan view:cache --no-interaction
}

chmod_logs() {
chmod -R 777 storage/logs/laravel.log
}

liftoff() {
php-fpm -D && nginx -g 'daemon off;'
}

composer
sqlite
migrate_db
clear_cache
chmod_logs
liftoff

exit 0

