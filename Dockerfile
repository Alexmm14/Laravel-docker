# Usa una imagen base de Ubuntu
FROM ubuntu:latest

# Configura el entorno para evitar la interactividad
ENV DEBIAN_FRONTEND=noninteractive

# Actualiza el sistema e instala las dependencias necesarias
RUN apt-get update \
    && apt-get install -y php \
    && apt-get install -y composer \
    && apt-get install -y vim \
    && apt-get install -y apache2 libapache2-mod-php \
    && apt-get install -y php-xml \
    && apt-get install -y git \
    && apt install -y php-curl \
    && a2enmod php8.1 \
    && sed -i 's/Listen 80/Listen 0.0.0.0:80/g' /etc/apache2/apache2.conf \
    && service apache2 restart \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Clona el proyecto desde GitHub
RUN git clone https://github.com/Alexmm14/Laravel-docker.git proyectoSitios

#Si te manda un error de autenticación al crear el contenedor, saca un token en tu perfil de github
#Descomenta la siguiente line y coloca tu token
# RUN git clone https://<Aquí tu token>@github.com/Alexmm14/Laravel-docker.git proyectoSitios

# Instala las dependencias de Composer y genera la clave de aplicación
RUN cd /var/www/html/proyectoSitios/proyectoSitios \
    && composer install \
    && chown -R www-data:www-data /var/www/html/proyectoSitios/proyectoSitios/storage \
    && chown -R www-data:www-data /var/www/html/proyectoSitios/proyectoSitios/bootstrap/cache \
    && cd /var/www/html/proyectoSitios/proyectoSitios/ \
    && cp .env.example .env \
    && php artisan key:generate


# Expone el puerto 80 (o el puerto que necesites)
EXPOSE 8080

# Cambia el comando CMD para iniciar Apache en segundo plano
CMD apache2ctl -D FOREGROUND \
    && tail -f /dev/null
