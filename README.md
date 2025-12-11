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
    
5.  **Generar la clave de la app**

    ``` bash
    php artisan key:generate
    ```

6.  **Configurar base de datos** La base **no se incluye** en el
    repositorio. Cada desarrollador puede usar:

    ``` bash
    touch database/database.sqlite
    ```    

7.  **Ejecutar migraciones**

    ``` bash
    php artisan migrate
    php artisan migrate:refresh --seed
    ```

8.  **Levantar el servidor**

    ``` bash
    composer run dev
    ```
    En caso de que falle ese comando:

    ``` bash
    php artisan serve
    ```
    
## Problema con `Database\QueryException`

Si aparece un error similar a este (y probablemente te va a aparecer porque de repente lo está haciendo):

    SQLSTATE[HY000]: General error: 1 no such table: sessions
    (Connection: sqlite, SQL: select * from "sessions" where ...)

Es porque en tu archivo `.env` el valor:

    SESSION_DRIVER=database

hace que Laravel busque una tabla llamada `sessions` en la base de
datos.

La única solución que he encontrado es cámbiarlo por:

    SESSION_DRIVER=file

Con esto Laravel usará archivos para gestionar las sesiones y el error
desaparecerá.
