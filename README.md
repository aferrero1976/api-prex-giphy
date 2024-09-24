# API PREX GIPHY

## Descripción

Este repositorio contiene la solución al desafío enviado por Prex para cubrir una de sus vacantes.

* **Autor:** Andrés D. Ferrero *(Ingeniero en Informática)*
* **Linkedin:** [aferrero1976](https://www.linkedin.com/in/aferrero1976/)


### Requerimientos para su ejecución
* Git
* Docker Compose

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

