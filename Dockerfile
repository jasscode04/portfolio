# Use official PHP Apache image
FROM php:8.2-apache

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite for custom routing / .htaccess
RUN a2enmod rewrite

# Copy all project files into Apache web directory
COPY . /var/www/html/

# Set permissions for web server
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for Render
EXPOSE 80
