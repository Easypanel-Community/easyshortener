mysql -u root -e "create database laravel"
cp .env.example .env
sed -i "s|APP_URL=|APP_URL=${GITPOD_WORKSPACE_URL}|g" .env
sed -i "s|ASSET_URL=|ASSET_URL=${GITPOD_WORKSPACE_URL}|g" .env
composer install
npm i
npm run build
php artisan key:generate
