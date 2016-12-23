FROM php:7.1-apache

RUN apt-get clean \
    && apt-get update \
    && apt-get install -y \
        htop \
        unzip \
        parallel \
        build-essential \
        libmcrypt-dev \
        libssl-dev \
        libicu-dev \
        libsqlite3-0 libsqlite3-dev sqlite3 \
        libxml2-dev libxslt1-dev

RUN docker-php-ext-install -j$(nproc) mysqli iconv mcrypt pdo pdo_mysql intl pdo_sqlite xsl

RUN pecl install xdebug-stable

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && a2enmod rewrite \
    && a2enmod headers

RUN curl -OL https://github.com/nikic/php-ast/archive/master.zip

RUN unzip master.zip \
    && cd php-ast-master \
    && phpize \
    && ./configure \
    && make \
    && make install

WORKDIR /bandmate

COPY ./ /bandmate/

RUN curl -O https://getcomposer.org/composer.phar \
    && chmod +x ./composer.phar \
    && ./composer.phar install

RUN php artisan key:generate; php artisan migrate:refresh && php artisan db:seed
