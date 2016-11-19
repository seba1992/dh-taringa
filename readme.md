# Ejemplo de autenticación y creación de un API en Laravel 5.3
Este repositorio contiene una pequeña ejemplificación de como utilizar la autenticación en Laravel 5.3 y como crear un API para que nuestra aplicación sea consumible desde otros sistemas, por ejemplo, desde una aplicación mobile.

Desarrollo hecho para el turno tarde del curso Full Stack de Digital House (Noviembre 2016)

## ¿Como utilizar este proyecto?
- Clonarlos el proyecto: `git clone https://github.com/seba1992/dh_taringa.git`
- Copiar el contenido del `.env.example` al .env `cp .env.example a .env`
- Crear una nueva base de datos y setearla en el `.env`
- En el directorio del proyecto ejecutar:
    - `composer install`
    - `php artisan key:generate`
    - `php artisan migrate --seed`
    - `php artisan serve`

## Rutas del API
El proyecto contiene un api minimamente funcional, para ver como solucionar los diferentes problemas que se comentan en el código, se aconseja como introducción ver la siguiente serie: https://laracasts.com/series/incremental-api-development.

Se incluye en el archivo `Taringa.postman_collection.json` una colección de Postman (instalátelo e importala) para que puedas jugar con el api(En principio probala con estas credenciales `email: bot@taringa.app`, `password:12345678`)
- `GET` api/v1/posts -- Lista todos los posts con paginación
- `GET` api/v1/posts/{id} -- Muestra la información de un post específico
- `GET` api/v1/users/{id}/posts -- Muestra los posts de un usuarios específico
- `POST` api/v1/login -- Nos permite loguearnos suministrando nuestro email y password
- `POST` api/v1/users/{id}/posts?api_token=... -- Creación de un post, requiere de autenticación