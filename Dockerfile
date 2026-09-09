FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev \
    libpng-dev libonig-dev libxml2-dev libjpeg-dev libfreetype6-dev \
    libicu-dev \
    && docker-php-ext-install pdo_mysql mysqli mbstring exif pcntl bcmath gd zip intl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Composer unlimited memory
ENV COMPOSER_MEMORY_LIMIT=-1

# Set working dir
WORKDIR /var/www/anautorepair

# Copy files
COPY . .

# Install dependencies
RUN composer install --no-interaction --prefer-dist

# Fix PHP-FPM to listen on all network interfaces
RUN sed -i 's/listen = .*/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

# Start PHP-FPM
CMD ["php-fpm"]
