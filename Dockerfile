# Usa una imagen base de PHP con Apache
FROM php:8.1-apache

# Copia el contenido de tu proyecto a la carpeta del servidor web
COPY . /var/www/html/

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Instala las extensiones de PHP necesarias
RUN docker-php-ext-install mysqli

# Habilita el buffering de salida
RUN echo "output_buffering = On" >> /usr/local/etc/php/conf.d/docker-php-output-buffering.ini