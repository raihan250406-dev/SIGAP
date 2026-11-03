FROM php:8.2-fpm

# Install dependensi sistem & ekstensi PHP (termasuk pdo_pgsql untuk PostgreSQL)
RUN apt-get update && apt-get install -y \
    git zip unzip libpng-dev libonig-dev libxml2-dev libpq-dev nginx \
    && docker-php-ext-install pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

# Copy Composer dari official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 80

CMD php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan serve --host=0.0.0.0 --port=80