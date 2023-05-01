mysql -u root -e "create database laravel"
cp .env.example .env
sed -i "s#APP_URL=http://localhost#APP_URL=$(gp url 80)#g" .env
sed -i "s|ASSET_URL=|ASSET_URL=${GITPOD_WORKSPACE_URL}|g" .env
sed -i "s|FORCE_HTTPS=false|FORCE_HTTPS=true" .env
composer install
npm i
npm run build
php artisan key:generate
