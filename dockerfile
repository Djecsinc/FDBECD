# Usa una imagen oficial de PHP con Apache y soporte para PostgreSQL
FROM php:8.0-apache

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Instalar la extensión de PostgreSQL para PHP
RUN docker-php-ext-install pgsql pdo_pgsql

# Copiar los archivos de tu aplicación al contenedor
COPY . /var/www/html/

# Configuración adicional si es necesario
WORKDIR /var/www/html
