# Flota Vehicular - Sistema de Gestión de Flotas

Este es un sistema de gestión de flotas de vehículos desarrollado con el framework Laravel. La aplicación permite administrar de manera integral todos los aspectos relacionados con los vehículos, conductores, viajes y mantenimientos de una empresa.

## ✨ Características Principales

*   **Gestión Integral de Vehículos:**
    *   Registro detallado de vehículos, incluyendo placa, modelo, año, color y kilometraje.
    *   Clasificación por marca y tipo para una organización más eficiente.
    *   Seguimiento del estado actual de cada vehículo (disponible, en viaje, en mantenimiento).

*   **Administración Completa de Conductores:**
    *   Registro de conductores con su información personal y de contacto.
    *   Gestión del ciclo de vida de contratos y licencias de conducir, asegurando que todo esté al día.

*   **Planificación y Seguimiento de Viajes:**
    *   Creación y gestión de rutas personalizadas.
    *   Asignación de viajes a conductores y vehículos específicos.
    *   Seguimiento de cada viaje con detalles como recorrido, tiempo estimado y costo total.

*   **Control de Combustible:**
    *   Registro de cada recarga de combustible, asociándola a un vehículo para un control de gastos preciso.

*   **Administración General del Sistema:**
    *   Gestión de empresas o clientes para un entorno multi-tenant.
    *   Administración centralizada de catálogos como marcas, tipos de vehículos, y tipos de contrato.

## 🗃️ Modelo de Datos

El sistema se estructura en torno a los siguientes modelos principales:

*   **Vehiculo:** Representa un vehículo de la flota.
    *   Se relaciona con `Marca` y `Tipo_Vehiculo`.
    *   Registra `Viaje` y `Recarga_Combustible`.
*   **Conductor:** Representa a un conductor.
    *   Asociado a `Viaje` y gestiona `Conductor_Contrato` y `Conductor_Licencia`.
*   **Viaje:** Modela un viaje, conectando `Vehiculo`, `Conductor` y `Ruta`.
*   **Empresa:** Gestiona la información de las empresas o clientes.
*   **Ruta:** Define las rutas para los viajes.
*   **Contrato y Licencia:** Administran los contratos y licencias de los conductores.

## 🛠️ Tecnologías Utilizadas

*   **Backend:** PHP, Laravel
*   **Frontend:** Blade, Vite.js (según la configuración por defecto de Laravel)
*   **Base de datos:** Compatible con MySQL, PostgreSQL, SQLite, SQL Server.
*   **Gestor de dependencias:** Composer

## 🚀 Instalación

Sigue estos pasos para configurar el proyecto en tu entorno de desarrollo local:

### Requisitos Previos

*   PHP >= 8.1
*   Composer
*   Node.js & npm
*   Un servidor de base de datos (MySQL, PostgreSQL, etc.)

### Pasos de Instalación

1.  **Clonar el repositorio:**
    ```bash
    git clone https://github.com/JordyPradaYanes/FlotaVehiculo.git
    cd FlotaVehiculo
    ```

2.  **Instalar dependencias de PHP:**
    ```bash
    composer install
    ```

3.  **Instalar dependencias de Node.js:**
    ```bash
    npm install
    ```

4.  **Configurar el entorno:**
    *   Copia el archivo de ejemplo `.env.example` a `.env`:
        ```bash
        cp .env.example .env
        ```
    *   Genera la clave de la aplicación:
        ```bash
        php artisan key:generate
        ```

5.  **Configurar la base de datos:**
    *   Abre el archivo `.env` y configura los detalles de tu base de datos (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

6.  **Ejecutar las migraciones:**
    *   Esto creará la estructura de la base de datos necesaria para la aplicación.
        ```bash
        php artisan migrate
        ```
7.  **(Opcional) Ejecutar los seeders:**
    *   Para poblar la base de datos con datos de ejemplo, ejecuta:
        ```bash
        php artisan db:seed
        ```
8.  **Compilar los assets:**
    ```bash
    npm run dev
    ```

9.  **Iniciar el servidor de desarrollo:**
    ```bash
    php artisan serve
    ```
    ¡Ahora puedes acceder a la aplicación en `http://localhost:8000`!

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

## Corrección del Botón de Eliminar

Se ha corregido un problema en el botón de eliminar de la vista de conductores, que no mostraba la confirmación de SweetAlert antes de eliminar un registro.

### El Problema

El archivo `public/backend/dist/js/conductores.js` no incluía la lógica para inicializar la confirmación de eliminación con SweetAlert2. Aunque se cargaba un script genérico (`delete-confirm.js`), el script específico de la vista (`conductores.js`) no invocaba la funcionalidad de confirmación, a diferencia de la sección de "Marcas", que sí funcionaba correctamente.

### La Solución

Para solucionar este problema, se ha replicado la funcionalidad de confirmación de eliminación del archivo `marcas.js` al archivo `conductores.js`. Se añadió la función `initializeDeleteConfirmation()`, que se encarga de:

1.  Seleccionar todos los formularios con la clase `.delete-form`.
2.  Añadir un listener al evento `submit`.
3.  Prevenir el envío automático del formulario.
4.  Mostrar un diálogo de confirmación de SweetAlert2, personalizado con el nombre del conductor a eliminar.
5.  Enviar el formulario solo si el usuario confirma la acción.

Este cambio asegura que la experiencia de usuario sea consistente en toda la aplicación, mostrando siempre una confirmación antes de realizar una acción destructiva.
