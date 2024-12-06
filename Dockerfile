# Use the official PHP image with necessary extensions
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    nginx \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_pgsql mbstring gd zip opcache

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . .

# Copy nginx configuration
COPY nginx.conf /etc/nginx/sites-available/default

# Set permissions for Laravel storage and cache folders
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Prepare Laravel application
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

# Create nginx pid directory
RUN mkdir -p /run/nginx

# Expose port
EXPOSE 8080

# Start Nginx and PHP-FPM
CMD service nginx start && php-fpm
