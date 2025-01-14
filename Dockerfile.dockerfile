# Usa la imagen base oficial de PHP con Apache
FROM php:8.1-apache

# Actualiza paquetes e instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        pdo_mysql \
        mysqli \
    && a2enmod rewrite

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Exponer el puerto 80 para el servicio HTTP
EXPOSE 80
