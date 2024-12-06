# Use the official PHP image with necessary extensions
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring gd zip opcache

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . .

# Set permissions for Laravel storage and cache folders
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose port 8080 for Render
EXPOSE 8080

# Set environment variable for Render
ENV PORT=8080

# Start Laravel application using PHP's built-in server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
