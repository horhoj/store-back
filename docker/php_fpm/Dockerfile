FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        unzip curl wget git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libxml2-dev \
        libzip-dev

RUN docker-php-ext-install -j$(nproc) iconv mysqli pdo_mysql zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install xdebug-2.9.2 && docker-php-ext-enable xdebug

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www/

CMD ["php-fpm"]
