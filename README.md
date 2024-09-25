# API PREX GIPHY

## Descripción

Este repositorio contiene la solución al desafío enviado por Prex para cubrir una de sus vacantes.

* **Autor:** Andrés D. Ferrero *(Ingeniero en Informática)*
* **Linkedin:** [aferrero1976](https://www.linkedin.com/in/aferrero1976/)


### Requerimientos para su ejecución
* PHP v8+
* Git v2+
* Docker Compose v2+

### Tecnologías utilizadas
* PHP 8
* Laravel 10
* MariaDB

### Integraciones con APIs externas
* Giphy


### Rutas implementadas
- ```POST api/register``` | **pública** | *Registro de un usuario en el sistema*
- ```POST api/login``` | **pública** | *Inicio de sesión, obteniendo un token de acceso*
- ```GET  api/gifs/search``` | **privada** | *Búsqueda de GIFS, integrando API de GIPHY*
- ```GET  api/gifs/{id}``` | **privada** | *Recuperar un GIF identificado, integrando API de GIPHY*
- ```POST api/gifs/favorite``` | **privada** | *Agregar a favoritos del usuario un GIF específico*

## Instalación y ejecución

1. Clonar este proyecto
```bash
git clone git@github.com:aferrero1976/api-prex-giphy.git
```

2. Ingresar a la carpeta del proyecto
```bash
cd api-prex-giphy
```


3. Generar variables de entorno en base al ejemplo
```bash
cp .env.example .env
```


4. Construir y ejecutar los contenedores
```bash
docker-compose up -d --build
```

*Aclaración: en el caso de que el proyecto no esté disponible, podría deberse a que el contenedor de Base de Datos no estaba listo al ejecutar las migraciones, por lo que se debería ejecutar manualmente los siguientes comandos:*
```
docker exec -it api_prex_giphy_php php artisan migrate
docker exec -it api_prex_giphy_php php artisan serve
```
Esto construirá las imágenes y levantará los contenedores en segundo plano, aplicación y base de datos, y el proyecto estará disponible en http://localhost:8000/

### Diagramas de Casos de Uso


### Diagrama Entidad-Relación (DER)


### Registro de interacción

Se utilizó el archivo del framework [(storage/logs/laravel.log)](storage/logs/laravel.log) para registrar todas las interacciones con las rutas del API según lo especificado:
- Usuario que realizo la petición.
- Servicio consultado.
- Cuerpo de la petición.
- Código HTTP de la respuesta.
- Cuerpo de la respuesta.
- IP de origen de la consulta.


## Postman

Se brindan 2 archivos para simular la interacción de un Cliente HTTP con la API desarrollada.
- [Environment](postman/api-prex-giphy-dev.postman_environment.json)
- [Collection](postman/Api-Prex-Giphy.postman_collection.json)

