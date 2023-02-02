#!/bin/sh

if [ ! -f /var/www/html/database/sqlite/easyshortner.db ]; then
    touch /var/www/html/database/sqlite/easyshortner.db
fi

chown -R www-data: /var/www/html/database/sqlite

cd /var/www/html

echo "                                                                 ";
echo "  ______                    _                _                   ";
echo " |  ____|                  | |              | |                  ";
echo " | |__   __ _ ___ _   _ ___| |__   ___  _ __| |_ _ __   ___ _ __ ";
echo " |  __| / _` / __| | | / __| '_ \ / _ \| '__| __| '_ \ / _ \ '__|";
echo " | |___| (_| \__ \ |_| \__ \ | | | (_) | |  | |_| | | |  __/ |   ";
echo " |______\__,_|___/\__, |___/_| |_|\___/|_|   \__|_| |_|\___|_|   ";
echo "                   __/ |                                         ";
echo "                  |___/                                          ";
echo "                                                                 ";

sleep(5)

echo "Starting Migrations..."
php artisan migrate --force

echo "Clearing caches..."
php artisan config:cache
php artisan view:cache

php-fpm -D && nginx -g 'daemon off;'
