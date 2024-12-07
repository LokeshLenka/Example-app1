# Base image for PHP
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    curl \
    && docker-php-ext-install pdo_mysql gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash -
RUN apt-get install -y nodejs

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . .

# Install Node.js dependencies
RUN npm install
RUN npm run build

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Configure Nginx
RUN mkdir -p /etc/nginx/sites-available /etc/nginx/sites-enabled
COPY nginx.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Expose port 8080 (Render's default)
EXPOSE 8080

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
