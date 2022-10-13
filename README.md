Docker con PHP 8.1 con opcache

## Uso

Puede ejecutar el contenedor utilizando este comando:

Primera vez
```bash
docker-compose up -d --build
```



## Bitácora

Conectar a la imagen Docker:

```bash
docker exec -it ipglobal-efrain_php_1 bash
```

Instalación de Symfony 6.1:

```bash
composer create-project symfony/skeleton:"6.1.*" application
```
Arrancar proyecto Symfony:

```bash
symfony server:start
```

Instalar PHPUnit:

```bash
composer require --dev symfony/test-pack
```

Ejecutar los tests unitarios:

```bash
php bin/phpunit
```

Instalar Twig:

```bash
composer require symfony/twig-pack
```

Instalar Maker:

```bash
composer require symfony/maker-bundle --dev
```

Instalar Asset:

```bash
composer require symfony/asset
```

Crear controlador:

```bash
symfony console make:controller PostController
```

Instalar Security Bundle:

```bash
composer require symfony/security-bundle
```

Instalar Serializer:

```bash
composer require symfony/serializer-pack
```

Instalar FOSRestBundle:

```bash
composer require friendsofsymfony/rest-bundle
```

Crear controlador API:

```bash
symfony console make:controller Api\\PostController
```

Instalar ORM (Para generar entidades):

```bash
composer require orm
```

Instalar Validator:

```bash
composer require symfony/validator
```

Instalar Annotations:

```bash
composer require annotations
```

Crear Entidad Post:

```bash
php bin/console make:entity Post
```

Inslatar HTTP Client

```bash
composer require symfony/http-client
```



## Comentarios

Aunque en mi actual empresa trabajamos con la metodología Git Flow, este proyecto lo he basado en Git Trunk ya que no necesito tantas ramas y me es más fácil así.

Se pueden montar las rutas de dos formas, definiendolas en el routes.yaml o con anotaciones en los propios controladores, yo voy a optar por esta segunda opción ya que es como siempre lo he hecho.

Para la plantilla HTML he usado un template admin de Themeforest que compré hace un tiempo (Porto Admin).
https://themeforest.net/item/porto-admin-responsive-html5-template/8539472

He montado los servicios de forma que el PostService siempre consuma JsonplaceholderService y quede como una capa a más bajo nivel.

La vadicación del POST he tratado de realizarla con los Form de Symfony, pero al venir desde API he tenido problemas y nunca me pasaba el $form->isValidate(), 
por lo que he optado por validarlo simplemente creando la entidad Post(), de forma que los propios atributos/anotaciones de las propiedades de la clase ya validan los tipos y fallan si no encajan.

Los endpoints de las APIs son:

GET Posts
http://127.0.0.1:8000/api/v1/posts

GET Post
http://127.0.0.1:8000/api/v1/post/{id}

POST Post ()
http://127.0.0.1:8000/api/v1/post
Hacemos la petición POST desde Postman y le pasamos en Body > form-data:
title = 'titulo'
body = 'body'
userId = 9

Y disculpad, que no me ha dado tiempo a pulir los tests ni a optimizar todo, sé que hay algunos que fallan, pero se me complicó la semana y no le pude dedicar más tiempo, prácticamente lo he hecho todo en un día.

