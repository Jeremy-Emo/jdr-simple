FROM php:8.2-apache-bullseye

ENV TZ Europe/Paris

WORKDIR /var/www

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    curl \
    git \
    unzip \
    libssl-dev \
    zlib1g-dev \
    libzip-dev \
    libicu-dev

RUN pecl install apcu

RUN docker-php-ext-install zip \
    intl \
    mysqli \
    pdo \
    pdo_mysql \
    bcmath

RUN docker-php-ext-enable apcu mysqli sodium

RUN apt clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && docker-php-source delete

ADD vhost-symfony.conf /etc/apache2/sites-enabled/000-default.conf
ADD php.ini /usr/local/etc/php/conf.d/override.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN a2enmod rewrite headers