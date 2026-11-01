FROM node:22.14-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci --no-audit

COPY . .
RUN npm run build


FROM serversideup/php:8.3-fpm-nginx

USER root

WORKDIR /var/www/html

RUN install-php-extensions bcmath gd intl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./

RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts --no-progress

COPY . .

COPY --from=frontend --chown=www-data:www-data /app/public/build ./public/build

RUN composer dump-autoload --no-dev --optimize --no-interaction \
    && mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs storage/app/private storage/app/public bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwX storage bootstrap/cache

ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    PHP_OPCACHE_ENABLE=1

EXPOSE 8080

USER www-data
