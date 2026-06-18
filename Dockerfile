FROM php:8.2-fpm-alpine

# Install system dependencies & PHP extensions
RUN apk add --no-cache nginx supervisor mariadb-client libpng-dev libjpeg-turbo-dev freetype-dev zip libzip-dev git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql gd zip bcmath

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# FIX: Create missing directories explicitly so Laravel doesn't crash
RUN mkdir -p /var/www/html/bootstrap/cache /var/www/html/storage/framework/views /var/www/html/storage/framework/cache /var/www/html/storage/framework/sessions

# FIX: Grant ownership BEFORE running composer install
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Run composer as the proper www-data user or let it optimize safely now
RUN composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 80

# Simple command to start the built-in PHP server for now
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
