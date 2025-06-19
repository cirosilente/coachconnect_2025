FROM php:8.2-fpm

# Installa dipendenze necessarie
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev \
    zip unzip curl git libzip-dev nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia i file del progetto
COPY . .

# Crea il file .env se non esiste
RUN cp .env.example .env

# Installa le dipendenze
RUN composer install --optimize-autoloader
RUN npm install && npm run build

# Prepara Laravel
RUN php artisan config:clear
RUN php artisan key:generate --force

# Permessi corretti per Laravel
RUN mkdir -p storage/framework/views && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# Avvia il server e l'applicazione Laravel
CMD php artisan migrate:fresh --seed --force || true && \
    php artisan serve --host=0.0.0.0 --port=8080

    