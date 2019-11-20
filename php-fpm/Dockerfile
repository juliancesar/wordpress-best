FROM wordpress:php7.3-fpm

RUN apt-get update
RUN apt-get install -y libz-dev libmemcached-dev && \
    pecl install memcached && \
    docker-php-ext-enable memcached