Laravel 12 - Estados de la República

Este proyecto está desarrollado con Laravel 12 y utiliza un Observer como patrón de diseño para la generación automática de slugs a partir de un nombre de estado proporcionado.

## Requisitos

- PHP: 8.3.20
- MySQL: 9.3.0
- Composer: última versión recomendada

## ⚙️ Instalación del proyecto

Clonar repositorio y entrar en la carpeta del proyecto:

```bash
git clone https://github.com/charlyrm14/enegence.git
cd mi-proyecto-laravel
```

## Instalar dependencias
```bash
composer install
```

## Archivo de entorno
```bash
cp .env.example .env
```

## Ejecutar migraciones
```bash
php artisan migrate
```

## Ajustar credenciales de conexión a BD
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

## Generar key de aplicación
```bash
php artisan key:generate
```

## Levantar el servidor de desarrollo
```bash
php artisan serve
```

## Este proyecto hace uso del Observer Pattern en Laravel.

Observer: StateObserver

- Funcionalidad: Generar automáticamente el slug para cada Estado al momento de ser creado o actualizado.

## Notas
- El proyecto está diseñado para funcionar con PHP 8.3.20 y MySQL 9.3.0.
- El slug se genera automáticamente en el momento de creación de un estado.
