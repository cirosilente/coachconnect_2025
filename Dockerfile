FROM php:8.2-fpm

# Dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev \
    zip unzip curl git libzip-dev nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --optimize-autoloader
RUN npm install && npm run build

RUN php artisan config:clear
RUN touch .env && php artisan key:generate
RUN php artisan migrate --force || true


RUN chmod -R 775 storage bootstrap/cache
EXPOSE 8080

# Ripulisco e poi faccio la migration e seeder
CMD php artisan config:clear && \
    php artisan migrate:fresh --seed --force || true && \
    php artisan serve --host=0.0.0.0 --port=8080