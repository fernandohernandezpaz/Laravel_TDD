FROM composer:2 as composer2
FROM php:8.0-apache

RUN apt update && apt install -y \
      g++ \
      libicu-dev \
      libpq-dev \
      libzip-dev \
      zip \
      zlib1g-dev \
    && docker-php-ext-install \
      intl \
      opcache \
      pdo \
      pdo_pgsql \
      pgsql


RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/laravel_docker


