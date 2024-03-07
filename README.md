# Laverl-Docker


Este es proyecto escolar desarrollado en laravel


Para poder empezar a realizar sus actividades, primero es necesario descargar docker.
Ya que se utilizará para conveniencia de todos. Para que no descarguen una maquina virtual o algo por el estilo.

Los pasos están orientados a terminal, deberá investigar como hacer todo esto si estas usando el entorno gráfico de docker

Pasos para iniciar el proyecto:

1- Descargar docker

2- Crear un contenedor de red:

    docker network create <nombre del contenedor de la red>

En esta paso tienes dos opciones, descargar únicamente el  la carpeta llamada docker o descargar todo el repositorio

3- En la terminal te diriges al directorio donde se tenga el dockerfile y ejecutas el siguiente comando para crear el contenedor (Si sucede algún error, edita tu archivo dockerfile):

    docker build -t <nombre del contenedor> .

4-Ejecuta el siguiente comando para iniciar el contenedor:

    docker run -d --name <nombre del contenedor> --network <nombre del contenedor de la red> -p 8080:80 <nombre del contenedor>

Listo, ahora puedes ir al navegador a visualizar si esta corriendo apache y laravel
mediante tu localhost por el puerto 8080


