# Usa una imagen oficial de PHP con Apache
FROM php:8.0-apache

# Instalar las dependencias necesarias para PostgreSQL y las herramientas de compilación
RUN apt-get update && apt-get install -y \
    libpq-dev \
    gcc \
    make \
    autoconf \
    libc-dev \
    pkg-config

# Instalar las extensiones de PHP para PostgreSQL
RUN docker-php-ext-install pgsql pdo_pgsql

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar los archivos de tu aplicación al contenedor
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80

# Configuración adicional si es necesario
WORKDIR /var/www/html

