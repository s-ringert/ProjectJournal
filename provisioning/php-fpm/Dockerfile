FROM php:7.2-fpm 

RUN apt-get update && apt-get install -y \
    && docker-php-ext-install pdo_mysql \
    && apt-get install git zip unzip -y
    
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN mkdir -p /app
WORKDIR /app