FROM php:8.3-fpm-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions gd xdebug pdo_mysql mysqli memcache

RUN docker-php-ext-install dba
    
COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY ./config/php.ini /usr/local/etc/php/

CMD ["php-fpm"]

EXPOSE 9000