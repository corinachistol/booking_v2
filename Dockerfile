FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    && docker-php-ext-configure gd \
            --with-freetype \
            --with-jpeg \
            --with-webp \
    && docker-php-ext-install -j$(nproc) gd
