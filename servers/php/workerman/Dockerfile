FROM php:8.0-cli-alpine

RUN apk update && apk add --update --no-cache \
    $PHPIZE_DEPS

RUN docker-php-ext-install pcntl

WORKDIR /application

COPY composer.json composer.lock ./
COPY server.php .

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN composer install -n

ENTRYPOINT ["php", "server.php", "start"]

RUN apk del $PHPIZE_DEPS
RUN rm -rf /var/cache/apk/*