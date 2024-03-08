# Laverl-Docker


Este es proyecto escolar desarrollado en laravel


Para poder empezar a realizar sus actividades, primero es necesario descargar docker.
Ya que se utilizará para conveniencia de todos. Para que no descarguen una maquina virtual o algo por el estilo.

Los pasos están orientados a terminal, deberá investigar como hacer todo esto si estas usando el entorno gráfico de docker

Pasos para iniciar el proyecto:

1- Descargar docker, en linux me pidio instalar docker compose. No se si pase en windows

2- Crear un contenedor de red:

    docker network create <nombre del contenedor de la red>

3- Descargar todo el repositorio en una carpeta de tu equipo

4- Te diriges a la carpeta donde clonaste el repositorio.

5- En el archivo docker-compose.yml:

    Debes de colocar la contraseña que le vas a poner a tu base de datos, despues en el archivo .env debes de colocar la misma contraseña donde se señala

6- Ejecutas el siguente comando:

    docker-compose up -d

7- Busca la ip del contenedor de laraver con el siguiente comando

    docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' laravel-container


Listo, ahora puedes ir al navegador a visualizar si esta corriendo apache y laravel
Ingresa la ip que te salio en el navegador


