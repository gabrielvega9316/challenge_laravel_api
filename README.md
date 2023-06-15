<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Proyecto MailUp

Este proyecto Laravel es una aplicación [describir brevemente la funcionalidad del proyecto]. A continuación, se proporcionan instrucciones para configurar y levantar el proyecto localmente, así como información sobre cómo utilizar la API.


## Configuración del entorno

Para levantar el proyecto sólo se debe ejecutar el comando
```sh
composer install
```

1. Configura la base de datos editando el archivo `.env` y reemplaza los siguientes valores con la información de tu entorno:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

2. Ejecuta las migraciones y los seeders para configurar la base de datos:

```sh
php artisan migrate --seed
```

## Levantar el proyecto

Para iniciar el servidor de desarrollo de Laravel, ejecuta el siguiente comando:
```sh
php artisan serve
```

El proyecto estará disponible en la dirección local [http://localhost:8000](http://localhost:8000).

## Uso de la API

La API proporciona un conjunto de endpoints para interactuar con los productos. A continuación se muestra la ruta de la API y los métodos disponibles:
Puedes importar collection para realizar solicitudes a la API, Puedes obtenerla [Aqui](https://github.com/gabrielvega9316/mailup_api/blob/main/resources/docs/MailUp-api.postman_collection.json)

Los endpoints correspondientes a los métodos mencionados son los siguientes:

- GET /product: Obtiene una lista de todos los productos.
- GET /product/{id}: Obtiene los detalles de un producto específico.
- POST /product: Crea un nuevo producto.
- PUT /product/{id}: Actualiza un producto existente.
- DELETE /product/{id}: Elimina un producto.

Para interactuar con la API, puedes utilizar herramientas como cURL o un cliente HTTP. Aquí tienes algunos ejemplos de cómo se verían las solicitudes:

