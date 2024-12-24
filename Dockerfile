# Use an official PHP image as a base
FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    curl \
    git \
    && docker-php-ext-install pdo_mysql mbstring

# Install MongoDB PHP extension
RUN apt-get update && apt-get install -y \
    libssl-dev \
    libsasl2-dev \
    libcurl4-openssl-dev \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]

