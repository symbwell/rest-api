FROM php:7.4-apache

RUN apt-get update \
&& apt-get install -y \
zip \
nano \
libicu-dev \
unzip

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql intl

WORKDIR /var/www/html

RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "vim"]
