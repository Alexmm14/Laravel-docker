# Laverl-Docker


Este es proyecto escolar desarrollado en laravel


Estimados compañeros de equipo, para poder empeza a realizar sus actividades, primero es necesario descargar docker.
Ya que estara utilizando por conveniencia de todos. Para que no descargue una maquina virtual o algo por el estilo.

Los pasos estaran orientados a terminal, debera investigar como hacer todo esto si estas usando el entorno gráfico de docker

Pasos para iniciar el proyecto:

1- Descargar docker
2- Crear un contenedor de red:
    docker network create <nombre del contenedir de la red>
En esta paso tienes dos opciones, descargar unicamente el dockerfile que esta en este repositorio o descargar todo el repositorio
3- En la terminal te dirigues al directorio donde tenga el dockerfile y ejecutas el siguiente comando para crear el contenedor (Si sucede algun error, edita tu archivo dockerfil):
    docker build -t <nombre del conedor> .
4-Ejecuta el siguiente comando para iniciar el contenedor:
    docker run -d --name <nombre del contenedor> --network <nombre del contenedir de la red> -p 8080:80 <nombre del contendor>

Listo, ahora puedes ir al navegador a visualizar si esta corriendo apache y laravel
mediante tu localhost por el puerto 8080

