FROM php:8.3-apache

# Copy the application files
COPY . /var/www/html

# Apache rewrite engine
RUN a2enmod rewrite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Install PHP dependencies
RUN composer install

