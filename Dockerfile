FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html
WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN chown -R nginx:nginx /var/www/html \
 && chmod -R 775 storage bootstrap/cache

ENV WEBROOT=/var/www/html/public
