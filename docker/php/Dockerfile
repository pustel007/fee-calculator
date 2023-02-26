FROM php:8.1-fpm

RUN apt-get update && apt-get install -y zip libpq-dev
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN apt-get clean \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

ADD php.conf /usr/local/etc/php-fpm.d/

WORKDIR /var/www