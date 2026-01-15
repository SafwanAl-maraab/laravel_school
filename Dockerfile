FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html
WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

# إنشاء ملف sqlite (لأن المشروع يستخدمه)
RUN touch database/database.sqlite

# مسح جميع الكاشات (الحل الجذري)
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# صلاحيات
RUN chown -R nginx:nginx /var/www/html \
 && chmod -R 775 storage bootstrap/cache database


RUN php artisan migrate --force || true

ENV WEBROOT=/var/www/html/public
