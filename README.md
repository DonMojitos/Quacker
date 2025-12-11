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

    **Solo si te da un Database\QueryException**:
    En tu archivo `.env` la línea `SESSION_DRIVER` tendrá el valor de `database`.
    Esto da un problwma porque busca una tabla en la BBDD llamada 'sessions'.
    La única forma que he visto para arreglarlo es darle este valor a `SESSION_DRIVER`: 
    ``` bash
    SESSION_DRIVER=file
    ```
    
6.  **Generar la clave de la app**

    ``` bash
    php artisan key:generate
    ```

7.  **Configurar base de datos** La base **no se incluye** en el
    repositorio. Cada desarrollador puede usar:

    ``` bash
    touch database/database.sqlite
    ```    

8.  **Ejecutar migraciones**

    ``` bash
    php artisan migrate
    php artisan migrate:refresh --seed
    ```

9.  **Levantar el servidor**

    ``` bash
    composer run dev
    ```
    En caso de que falle ese comando:

    ``` bash
    php artisan serve
    ```
