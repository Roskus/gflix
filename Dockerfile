FROM php:8.4-apache

WORKDIR /var/www/gflix

# Set the working directory in the container
ADD infrastructure/etc/ssl /etc/ssl
ADD . /var/www/gflix

ENV APACHE_DOCUMENT_ROOT /var/www/gflix/public

# Install system dependencies
RUN apt-get update && apt-get install -y \
    ca-certificates \
    curl \
    openssl \
    git \
    libpq-dev \
    libxml2-dev \
    libonig-dev \
    zlib1g-dev \
    libjpeg-dev \
    libpng-dev \
    unzip \
    vim \
    nano

RUN rm -rf /var/lib/apt/lists/* && \
    git config --global --add safe.directory /var/www/gflix

# Install PHP extensions
RUN docker-php-ext-install bcmath xml pdo pgsql pdo_pgsql && \
    docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install gd && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    chmod +x /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

# Install application dependencies using Composer
RUN cd /var/www/gflix && composer install --no-interaction --optimize-autoloader

# Check if www-data user exists and create if not
RUN getent group www-data || groupadd -g 33 www-data
RUN getent passwd www-data || useradd -u 33 -g www-data -d /var/www -s /usr/sbin/nologin www-data

# Fix permissions
RUN chown -R www-data:www-data /var/www/gflix

# Set up Apache virtual host
COPY infrastructure/etc/apache2/apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod ssl rewrite

EXPOSE 80
EXPOSE 443

# Start Apache server
CMD ["apache2-foreground"]
