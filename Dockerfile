FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html
WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN touch database/database.sqlite

RUN chown -R nginx:nginx /var/www/html \
 && chmod -R 775 storage bootstrap/cache database

ENV WEBROOT=/var/www/html/public
