# Usa l'immagine PHP con FPM
FROM php:8.2-fpm

# Installa le dipendenze necessarie
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev \
    zip unzip curl git libzip-dev nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Installa Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Imposta la directory di lavoro nel container
WORKDIR /var/www/html

# Copia tutti i file del progetto dentro il container
COPY . .

# Installa le dipendenze PHP e Node
RUN composer install --optimize-autoloader
RUN npm install && npm run build

# Comandi artisan pre-run
RUN php artisan config:clear
RUN php artisan key:generate --force
RUN chmod -R 775 storage bootstrap/cache

# Espone la porta usata da php artisan serve
EXPOSE 8080

# Comando finale: pulizia + migrazione + avvio server
CMD php artisan config:clear && \
    php artisan migrate:fresh --seed --force || true && \
    php artisan serve --host=0.0.0.0 --port=8080