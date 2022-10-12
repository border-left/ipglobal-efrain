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