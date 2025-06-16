# Sistema de Gestión de Denuncias Ciudadanas

## Descripción
Sistema web desarrollado para la gestión eficiente de denuncias ciudadanas, permitiendo el registro, seguimiento y resolución de quejas y sugerencias de los ciudadanos.

## Características Principales

### 1. Dashboard
- Vista general con estadísticas en tiempo real
- Contador de denuncias totales
- Contador de denuncias pendientes
- Contador de denuncias en proceso
- Contador de denuncias resueltas
- Lista de denuncias recientes

### 2. Gestión de Denuncias
- Listado de todas las denuncias con paginación
- Filtrado y búsqueda de denuncias
- Registro de nuevas denuncias
- Edición de denuncias existentes
- Eliminación de denuncias
- Actualización de estados (Pendiente, En Proceso, Resuelto)

### 3. Interfaz de Usuario
- Menú lateral con navegación intuitiva
- Diseño responsivo (adaptable a diferentes dispositivos)
- Iconos descriptivos para mejor experiencia de usuario
- Modal informativo "Acerca de" con detalles del sistema

## Tecnologías Utilizadas

### Frontend
- HTML5
- CSS3
- JavaScript
- Bootstrap 5
- Font Awesome (iconos)
- DataTables (tablas interactivas)

### Backend
- PHP
- MySQL
- Arquitectura MVC (Modelo-Vista-Controlador)

## Estructura del Proyecto

```
PNL_SeclenLeonardo/
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
├── config/
│   └── config.php
├── controllers/
│   ├── DashboardController.php
│   └── DenunciaController.php
├── models/
│   ├── Database.php
│   └── Denuncia.php
├── views/
│   ├── dashboard/
│   │   └── index.php
│   ├── denuncias/
│   │   ├── create.php
│   │   ├── edit.php
│   │   └── index.php
│   └── layouts/
│       └── main.php
└── index.php
```

## Funcionalidades Detalladas

### Dashboard
- Muestra estadísticas en tiempo real
- Actualización automática de contadores
- Visualización de denuncias recientes
- Acceso rápido a funciones principales

### Gestión de Denuncias
1. **Listado de Denuncias**
   - Tabla con paginación
   - Búsqueda y filtrado
   - Ordenamiento por columnas
   - Acciones rápidas (editar/eliminar)

2. **Nueva Denuncia**
   - Formulario de registro
   - Validación de campos
   - Asignación automática de fecha
   - Estado inicial "Pendiente"

3. **Edición de Denuncias**
   - Modificación de datos
   - Actualización de estado
   - Registro de cambios

4. **Eliminación de Denuncias**
   - Confirmación antes de eliminar
   - Eliminación segura con respaldo

### Navegación
- Menú lateral colapsable
- Acceso rápido a todas las funciones
- Indicador de página actual
- Botón "Acerca de" con información del sistema

## Requisitos del Sistema

### Servidor
- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache/Nginx)

### Navegadores Soportados
- Google Chrome (recomendado)
- Mozilla Firefox
- Microsoft Edge
- Safari

## Instalación

1. Clonar el repositorio:
```bash
git clone [URL_DEL_REPOSITORIO]
```

2. Configurar la base de datos:
- Crear una base de datos MySQL
- Importar el archivo SQL proporcionado
- Configurar las credenciales en `config/config.php`

3. Configurar el servidor web:
- Apuntar el directorio raíz al directorio del proyecto
- Asegurar que el módulo rewrite esté habilitado

4. Acceder al sistema:
- Abrir el navegador
- Navegar a la URL del proyecto
- Iniciar sesión con las credenciales por defecto

## Mantenimiento

### Actualizaciones
- Realizar backup de la base de datos antes de actualizar
- Seguir el proceso de actualización en el repositorio
- Verificar la compatibilidad de versiones

### Respaldo
- Backup diario de la base de datos
- Respaldo semanal de archivos
- Almacenamiento en ubicación segura

## Soporte

Para reportar problemas o solicitar ayuda:
- Crear un issue en el repositorio
- Contactar al desarrollador: Leonardo Seclen
- Versión actual: 1.0.0
- Última actualización: <?php echo date('d/m/Y'); ?>

## Licencia
Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles. 