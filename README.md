# Flota Vehicular - Sistema de Gestión de Flotas

Este es un sistema de gestión de flotas de vehículos desarrollado con el framework Laravel. La aplicación permite administrar de manera integral todos los aspectos relacionados con los vehículos, conductores, viajes y mantenimientos de una empresa.

## ✨ Características Principales

*   **Gestión de Vehículos:**
    *   Registro de vehículos con detalles como marca, modelo y tipo.
    *   Administración de marcas y tipos de vehículos.
*   **Gestión de Conductores:**
    *   Registro de conductores y asignación a vehículos.
    *   Administración de licencias de conducir y contratos.
*   **Planificación y Seguimiento:**
    *   Creación y gestión de rutas.
    *   Registro y seguimiento de viajes.
*   **Control de Combustible:**
    *   Registro de recargas de combustible para cada vehículo.
*   **Administración General:**
    *   Gestión de empresas o clientes.

## 🛠️ Tecnologías Utilizadas

*   **Backend:** PHP, Laravel
*   **Frontend:** Blade, Vite.js (según la configuración por defecto de Laravel)
*   **Base de datos:** Compatible con MySQL, PostgreSQL, SQLite, SQL Server.
*   **Gestor de dependencias:** Composer

## 🚀 Instalación

Sigue estos pasos para configurar el proyecto en tu entorno de desarrollo local:

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://URL-DEL-REPOSITORIO.git](https://github.com/JordyPradaYanes/FlotaVehiculo)
    cd flotaVehiculo
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

7.  **Compilar los assets:**
    ```bash
    npm run dev
    ```

8.  **Iniciar el servidor de desarrollo:**
    ```bash
    php artisan serve
    ```
    ¡Ahora puedes acceder a la aplicación en `http://localhost:8000`!

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.
