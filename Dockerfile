# syntax=docker/dockerfile:1

FROM composer:2 AS composer

FROM php:8.3-cli-bookworm

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        zip \
        libsqlite3-dev \
        libonig-dev \
        libzip-dev \
    && docker-php-ext-install -j"$(nproc)" pdo_sqlite mbstring zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN git config --system --add safe.directory /app

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --no-progress

CMD ["vendor/bin/phpunit"]
