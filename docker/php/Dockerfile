FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
  git zip unzip libzip-dev libonig-dev

RUN docker-php-ext-install pdo_mysql zip

WORKDIR /var/www
