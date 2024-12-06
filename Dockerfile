FROM php:8.2-apache

# Install system dependencies
# Install system dependencies
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
    libpq-dev  # Add this line to install PostgreSQL development libraries \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_pgsql mbstring gd zip opcache

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy application code
WORKDIR /var/www/html
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache to use the correct port and document root
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Expose the port Render uses
EXPOSE 8080

# Start Apache
CMD ["apache2-foreground"]
