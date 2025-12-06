# Quacker

Quacker es una aplicación estilo Twitter creada para la asignatura de entorno servidor en DAW 25/26.

## Guía de Despliegue

1.  **Clonar el repositorio**

    ``` bash
    git clone git@github.com:DonMojitos/Quacker.git
    cd Quacker
    ```

2.  **Instalar dependencias de PHP**

    ``` bash
    composer install
    ```

3.  **Instalar dependencias de Node**

    ``` bash
    npm install
    ```

4.  **Crear tu archivo `.env`** Copia el de ejemplo:

    Cambia el nombre de `.env.example` a `.env`.
    
6.  **Generar la clave de la app**

    ``` bash
    php artisan key:generate
    ```

7.  **Configurar base de datos** La base **no se incluye** en el
    repositorio. Cada desarrollador puede usar:

    ``` bash
    touch database/database.sqlite
    ```

    Y en `.env`:

        DB_CONNECTION=sqlite
        DB_DATABASE=/ruta/absoluta/database.sqlite

8.  **Ejecutar migraciones**

    ``` bash
    php artisan migrate
    ```

9.  **Levantar el servidor**

    ``` bash
    composer run dev
    ```
    o si falla ese comando:

    ``` bash
    php artisan serve
    ```

10.  **Compilar assets (si aplica)**

    ``` bash
    npm run dev
    ```
