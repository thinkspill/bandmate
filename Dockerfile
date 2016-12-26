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

RUN curl -O https://getcomposer.org/composer.phar && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer

WORKDIR /bandmate

COPY ./composer.json /bandmate/composer.json
COPY ./composer.lock /bandmate/composer.lock
COPY ./database /bandmate/database
COPY ./tests /bandmate/tests
COPY ./artisan /bandmate/artisan
COPY ./bootstrap /bandmate/bootstrap

RUN composer install --prefer-dist --no-progress --no-suggest --no-autoloader --no-scripts

COPY ./app /bandmate/app
COPY ./config /bandmate/config
COPY ./public /bandmate/public
COPY ./resources /bandmate/resources
COPY ./routes /bandmate/routes
COPY ./storage /bandmate/storage
COPY ./.env /bandmate/.env
COPY ./gulpfile.js /bandmate/gulpfile.js
COPY ./package.json /bandmate/package.json
COPY ./phpunit.xml /bandmate/phpunit.xml
COPY ./server.php /bandmate/server.php
COPY ./yarn.lock /bandmate/yarn.lock

RUN composer dumpautoload -o

RUN php artisan key:generate

RUN touch /bandmate.sqlite \
        && php artisan migrate \
        && php artisan db:seed

RUN chmod -R 777 /bandmate/storage

RUN vendor/bin/phpunit