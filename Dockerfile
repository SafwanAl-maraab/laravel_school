FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html
WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

# مسح كل أنواع الكاش (الحل النهائي)
RUN php artisan config:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true
RUN php artisan cache:clear || true

RUN chown -R nginx:nginx /var/www/html \
 && chmod -R 775 storage bootstrap/cache

ENV WEBROOT=/var/www/html/public
