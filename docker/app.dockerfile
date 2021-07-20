FROM php:7.4.5-fpm-alpine

RUN apk update

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer
COPY composer.json ./
COPY composer.lock ./
RUN composer install --no-scripts --no-autoloader
COPY . ./
RUN composer dump-autoload --optimize

# Setup working directory
WORKDIR /var/www