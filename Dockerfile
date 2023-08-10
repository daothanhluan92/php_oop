FROM php:apache
RUN mkdir  -p  var/www/html
RUN docker-php-ext-install pdo pdo_mysql
