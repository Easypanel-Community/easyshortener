FROM node:17.4-alpine As asset_builder

LABEL maintainer="Supernova3339 <supernova@superdev.one>"

LABEL description="Easyshortener Dockerized"

WORKDIR /app

COPY ./package.json ./
COPY ./package-lock.json ./
COPY ./vite.config.js ./
COPY ./postcss.config.js ./
COPY ./tailwind.config.js ./
COPY ./resources ./resources

RUN npm install \
    && npm run build


FROM php:fpm-alpine
WORKDIR /var/www/html


COPY --from=asset_builder /app/public/build ./public/build

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install opcache \
    && apk add --no-cache \
    mariadb-client \
    sqlite \
    nginx 
    
COPY . ./
RUN cp .env.example .env

RUN mkdir ./database/sqlite \
    && chown -R www-data: /var/www/html \
    && rm -rf ./docker

COPY ./docker/config/easyshortener-php.ini /usr/local/etc/php/conf.d/easyshortener-php.ini
COPY ./docker/config/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/config/site-nginx.conf /etc/nginx/http.d/default.conf

# RUN chmod +x ./docker-entrypoint.sh

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chown -R www-data:www-data *
RUN chmod -R 777 storage

EXPOSE 80
USER root
COPY docker-entrypoint.sh /opt/docker/provision/entrypoint.d/99-init.sh
# CMD ["docker-entrypoint.sh"]
