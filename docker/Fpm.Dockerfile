FROM php:8.4-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip sqlite3 libsqlite3-dev libzip-dev \
 && docker-php-ext-install pdo_sqlite zip \
 && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/laravel-docker
