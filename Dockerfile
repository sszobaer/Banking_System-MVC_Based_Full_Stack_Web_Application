# Use official PHP image
FROM php:8.1-apache

# Enable Apache URL rewriting
RUN a2enmod rewrite

# Copy everything into the container
COPY . /var/www/html/

# Set default working directory
WORKDIR /var/www/html/

# Set file permissions
RUN chown -R www-data:www-data /var/www/html

# Expose Apache port
EXPOSE 80
