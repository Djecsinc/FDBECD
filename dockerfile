# Usa la imagen oficial de PHP desde Docker Hub
FROM php:7.4-apache

# Habilita mod_rewrite para Apache (si es necesario)
RUN a2enmod rewrite

# Copia los archivos de tu proyecto al contenedor
COPY . /var/www/html/

# Exponer el puerto 80 para la web
EXPOSE 80
