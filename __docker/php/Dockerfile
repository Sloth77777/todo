FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
        bash \
        curl \
        git \
        libzip-dev \
        icu-dev \
        oniguruma-dev \
        tzdata

RUN docker-php-ext-install \
        pdo_mysql \
        mbstring \
        zip \
        intl \
        opcache

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm", "-F"]
