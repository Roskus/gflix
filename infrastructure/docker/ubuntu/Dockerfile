FROM nginx:stable

ENV DEBIAN_FRONTEND=noninteractive
ENV PHP_VERSION=8.4

WORKDIR /var/www/gflix

# Install PHP and dependencies
RUN apt-get update && apt-get install -y \
    ca-certificates \
    curl \
    wget \
    git \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-cli \
    php${PHP_VERSION}-common \
    php${PHP_VERSION}-pgsql \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-bcmath \
    php${PHP_VERSION}-gd \
    php${PHP_VERSION}-curl \
    libpq-dev \
    composer \
    && rm -rf /var/lib/apt/lists/* \
    && git config --global --add safe.directory /var/www/gflix

# Add source code
ADD . /var/www/gflix

# Create necessary directories
RUN mkdir -p /var/www/gflix/storage bootstrap/cache

# Set permissions for www-data
RUN chown -R www-data:www-data /var/www/gflix \
    && chmod -R 755 /var/www/gflix

# Install Composer dependencies
RUN composer install --no-interaction --optimize-autoloader

EXPOSE 80 443

# Create entrypoint script
RUN echo '#!/bin/bash\n\
mkdir -p /var/cache/nginx/client_temp /var/run/php\n\
chown -R www-data:www-data /var/www/gflix\n\
php-fpm8.4 -D\n\
nginx -g "daemon off;"\n\
' > /entrypoint.sh && chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
