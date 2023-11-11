FROM php:8.2-apache

WORKDIR /var/www/

RUN apt-get update
RUN apt-get -y install libzip-dev
RUN docker-php-ext-install zip pdo_mysql
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
EXPOSE 8080
COPY . /var/www/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN composer install
RUN chmod 777 -R /var/www/storage/ && \
    echo "Listen 8080" >> /etc/apache2/ports.conf  && \
    a2enmod rewrite