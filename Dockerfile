# Use the official PHP 8 image
FROM php:8-fpm

# Set the working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libjpeg-dev \
    libpq-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git


# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg 

RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install application dependencies


# Copy the Laravel application files into the container
COPY . .

RUN composer install



# Expose port 9000 and start the PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]


