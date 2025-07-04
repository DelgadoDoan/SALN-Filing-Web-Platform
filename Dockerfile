FROM php:8.4-apache

# Install dependencies
RUN apt-get update && \
    apt-get install -y\
    libzip-dev \
    zip

# Enable mod rewrite
RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's#/var/www/html#${APACHE_DOCUMENT_ROOT}#g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's#/var/www/#${APACHE_DOCUMENT_ROOT}#g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy app code
COPY . /var/www/html

# Setup working directory
WORKDIR /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install

# Grant permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Grant database permission
RUN touch /var/www/html/database/database.sqlite && \
    chown -R www-data:www-data /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache