#!/bin/sh

logo() {

echo -e "  _____                    _                _                        "                       
echo -e " | ____|__ _ ___ _   _ ___| |__   ___  _ __| |_ ___ _ __   ___ _ __  "
echo -e " |  _| / _` / __| | | / __| '_ \ / _ \| '__| __/ _ \ '_ \ / _ \ '__| "
echo -e " | |__| (_| \__ \ |_| \__ \ | | | (_) | |  | ||  __/ | | |  __/ |    "
echo -e " |_____\__,_|___/\__, |___/_| |_|\___/|_|   \__\___|_| |_|\___|_|    "
echo -e "                 |___/                                               "

sleep 5

}


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

logo
composer
sqlite
migrate_db
clear_cache
chmod_logs
liftoff

