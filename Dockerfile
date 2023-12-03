FROM php:8.2-fpm

WORKDIR /var/www/gflix

# Set the working directory in the container
COPY . /var/www/gflix

# Install system dependencies
RUN apt-get update && \
    apt-get install -y \
    git \
    libpq-dev \
    postgresql-dev \
    unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions required by your application
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql

# Install application dependencies using Composer
RUN composer install --no-interaction --optimize-autoloader

CMD ["php-fpm"]

EXPOSE 9000
