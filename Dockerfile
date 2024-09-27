FROM ubuntu:24.04 AS base

# Install dependencies
RUN apt update
RUN apt install -y curl git netcat-openbsd\
    php8.3\
    php8.3-cli\
    php8.3-common\
    php8.3-fpm\
    php8.3-mysql\
    php8.3-zip\
    php8.3-gd\
    php8.3-mbstring\
    php8.3-curl\
    php8.3-xml\
    php8.3-bcmath\
    php8.3-pdo

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install

RUN chown -R :www-data /var/www/html

EXPOSE 8000
