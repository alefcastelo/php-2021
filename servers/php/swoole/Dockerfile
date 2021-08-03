FROM php:8.0-cli

RUN pecl install swoole

RUN docker-php-ext-enable swoole

WORKDIR /application

COPY server.php .

CMD ["php", "server.php"]