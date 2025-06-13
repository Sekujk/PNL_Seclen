# Sistema de Gestión de Denuncias

Sistema web desarrollado en PHP utilizando el patrón MVC para la gestión de denuncias ciudadanas.

## Características

- Gestión completa de denuncias (Crear, Leer, Actualizar, Eliminar)
- Estados de denuncias (Pendiente, En Proceso, Resuelto)
- Búsqueda por título, ciudadano y ubicación
- Paginación de resultados
- Interfaz responsiva y moderna
- Diseño intuitivo y fácil de usar

## Requisitos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache/Nginx)
- XAMPP (recomendado)

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/Sekujk/PNL_Seclen.git
```

2. Importar la base de datos:
- Crear una base de datos llamada `denuncias_db`
- Importar el archivo SQL proporcionado

3. Configurar la conexión:
- Editar el archivo `config/database.php` con tus credenciales

4. Acceder al sistema:
- Abrir en el navegador: `http://localhost/PNL_Seclen`

## Estructura del Proyecto

```
PNL_Seclen/
├── assets/
│   └── css/
│       └── style.css
├── config/
│   └── database.php
├── controllers/
│   └── DenunciaController.php
├── models/
│   └── Denuncia.php
├── views/
│   ├── layouts/
│   │   └── main.php
│   └── denuncias/
│       ├── index.php
│       ├── create.php
│       └── edit.php
└── index.php
```

## Tecnologías Utilizadas

- PHP
- MySQL
- Bootstrap 5
- Font Awesome
- JavaScript
- HTML5
- CSS3

## Autor

Leonardo Seclen

## Licencia

Este proyecto está bajo la Licencia MIT. 