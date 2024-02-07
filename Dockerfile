FROM php:8.3-apache

WORKDIR /var/www/gflix

# Set the working directory in the container
ADD . /var/www/gflix

ENV APACHE_DOCUMENT_ROOT /var/www/gflix/public

# Install system dependencies
RUN apt-get update && \
    apt-get install -y \
    curl \
    openssl \
    git \
    libpq-dev \
    libxml2-dev \
    libonig-dev \
    unzip \
    vim \
    nano

# Install PHP extensions required by your application
RUN docker-php-ext-install bcmath xml \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pgsql pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

# Install application dependencies using Composer
RUN composer install --no-interaction --optimize-autoloader

# Change user
USER root

# Fix permissions
RUN chmod -R 775 /var/www/gflix
RUN chown -R www-data:www-data /var/www/gflix

# Set up Apache virtual host
COPY apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

#RUN php artisan migrate --force

RUN service apache2 start

EXPOSE 80
EXPOSE 443

# Start Apache server
CMD ["apache2-foreground"]
