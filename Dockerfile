FROM laravelsail/php83-composer

USER root

RUN apt-get update \
    && apt-get install -y \
    default-mysql-client \
    vim \
    && docker-php-ext-install pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug
