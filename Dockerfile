# Use the official PHP image as the base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy the application code
COPY . .

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install dependencies using Composer
RUN composer install --no-dev --optimize-autoloader

# Nginx setup
RUN echo "daemon off;" >> /etc/nginx/nginx.conf
COPY ./nginx.conf /etc/nginx/nginx.conf

# Expose the application port
ENV PORT=8000
EXPOSE ${PORT}

# Start Nginx and PHP-FPM
CMD service php8.2-fpm start && nginx -g "daemon off;"
