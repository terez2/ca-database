FROM php:7.1-apache-stretch
ENV APACHE_DOCUMENT_ROOT /var/www/html/www
# Change document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite && a2ensite default-ssl && a2enmod ssl
RUN apt-get update && apt-get install -y libssl-dev
RUN docker-php-ext-install gettext
RUN docker-php-ext-install pdo pdo_mysql
# Install GD extentsion
RUN apt-get install -y libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/ssl-cert-snakeoil.key -out /etc/ssl/certs/ssl-cert-snakeoil.pem -subj "/C=AT/ST=Vienna/L=Vienna/O=Security/OU=Development/CN=example.com"
COPY . /var/www/html
EXPOSE 443