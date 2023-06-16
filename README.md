<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Proyecto MailUp

Este proyecto en Laravel 9 es una aplicación para realizar abm de productos. A continuación, se proporcionan instrucciones para configurar y levantar el proyecto localmente, así como información sobre cómo utilizar la API.


## Configuración del entorno

Ejecutar composer para instalar las dependencias necesarias
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

2. Ejecuta las migraciones y los seeders para armar la base de datos:

```sh
php artisan migrate --seed
```

## Levantar el proyecto

Para iniciar el servidor de desarrollo de Laravel, ejecuta el siguiente comando:
```sh
php artisan serve
```

El proyecto estará disponible en la dirección local [http://localhost:8000](http://localhost:8000).

## Idioma de API

La api cuenta con la posibilidad de configurarla para obtener mensajes de respuesta en ingles y español. Para configurar idioma debe ir a
```config/app.php``` -> en la linea ``` 'locale' => 'es',``` puede seleccionar español = "es" o inglés = "en" 

## Uso de la API

La API proporciona un conjunto de endpoints para interactuar con los productos. A continuación se muestra la ruta de la API y los métodos disponibles:

Te facilito la collection para importar, asi interactúes con la API, Puedes obtenerla [Aqui](https://github.com/gabrielvega9316/mailup_api/blob/main/resources/docs/MailUp-api.postman_collection.json)

Los endpoints correspondientes a los métodos mencionados son los siguientes:

- GET /product: Obtiene una lista de todos los productos.
- GET /product/{id}: Obtiene los detalles de un producto específico.
   - Cuenta con params para: 
        - busqueda -> Ejemplo buscando "exo" `api/product?search=exo`
        - items por pagina -> Ejemplo `api/product?per_page=5`
        - pagina -> Ejemplo `api/product?page=3`
    
    
- POST /product: Crea un nuevo producto.
- PUT /product/{id}: Actualiza un producto existente.
    - Manejo de imagen: Si envia una imagen esta remplazara a la antigua imagen por la nueva, Si no envia imagen conservara la almacenada.
    - Header necesario: key -> X-HTTP-Method-Override | value -> PUT 
- DELETE /product/{id}: Elimina un producto.

Para interactuar con la API, recomiendo utilizar la herramienta postman . La estructura de la respuesta es la siguiente:

```sh
    "success": true,
    "message": "Product successfully created",
    "response": {
        .
        .
    }
```

