FROM php:8.2-fpm

# Installa dipendenze di sistema
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev \
    zip unzip curl git libzip-dev nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Imposta la working directory
WORKDIR /var/www/html

# Copia solo i file di dipendenze per sfruttare la cache Docker
COPY package*.json ./
COPY composer.json composer.lock ./

# Installa dipendenze
RUN npm install
RUN composer install --optimize-autoloader

# Copia tutti i file del progetto (dopo le installazioni per evitare di invalidare cache)
COPY . .

# Crea file .env
RUN cp .env.example .env

# Costruisci i file frontend
RUN npm run build

# Prepara Laravel
RUN php artisan config:clear && \
    php artisan key:generate --force

# Imposta permessi corretti
RUN mkdir -p storage/framework/views && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# Comando finale: migra il DB e avvia il server
CMD php artisan migrate:fresh --seed --force || true && \
    php artisan serve --host=0.0.0.0 --port=8080
