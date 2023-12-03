FROM php:7.3-fpm

WORKDIR /var/www/gflix

# Set the working directory in the container
COPY . /var/www/gflix

# Install system dependencies
RUN apt-get update && \
    apt-get install -y \
    git \
    libpq-dev \
    libxml2-dev \
    unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions required by your application
RUN docker-php-ext-install bcmath xml mbstring \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql

CMD ["tail", "-f", "/dev/null"]

# Install application dependencies using Composer
#RUN composer install --no-interaction --optimize-autoloader

#CMD ["php-fpm"]

#EXPOSE 9000
