# Quacker

Quacker es una aplicación estilo Twitter creada para la asignatura de entorno servidor en DAW 25/26.

Para poder hacer uso del proyecto crea en /database -> database.sqlite

Para mantener la rama `main` limpia recomiendo que usemos el siguiente flujo de trabajo:

## La rama main

* En principio, se deja quitecica.
* La dejo bloqueada para evitar "pushes" directos, como un por si acaso.
* Solo recibe cambios mediante **Pull Requests revisados por nosotros**.
* De la unica rama que se mergea a main es `develop`.

## La rama develop

* Contiene únicamente código que se haya aprobado.
* Solo recibe cambios mediante que se haya resuelto los conflictos en las ramas individuales.
* El codigo se mergea mediante **Pull Requests revisados por nosotros**

## Ramas personales (nombre-alumno)

* Esta rama se mergea en la develop.
* Contiene codigo de la rama develop, además del código que hayamos implementado en las features.
* Tienen que estar actualizadas, después de terminar una feature, con la rama individual más actualizada.

Ejemplos:

* ivan
* manuel
* monica

## Ramas de características (feature/*)

* Estas ramas nacen de nuestras ramas personales.
* Cada nueva funcionalidad se desarrolla, idealmente, en una rama independiente.
* Estas ramas se mergean en la rama personal.
* No es obligatorio pero así nos vamos a ahorrar mareos de cabeza.

Ejemplos:

* feature/login
* feature/feed
* feature/perfil-usuario

## Guía de Despliegue

1.  **Clonar el repositorio**

    ``` bash
    git clone git@github.com:DonMojitos/Quacker.git
    cd carpeta-del-proyecto
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

    Cambiale el nombre de .env.example a .env y configura:

    -   Base de datos (local)
    -   APP_URL
    -   Claves, tokens, etc.

5.  **Generar la clave de la app**

    ``` bash
    php artisan key:generate
    ```

6.  **Configurar base de datos** La base **no se incluye** en el
    repositorio. Cada desarrollador puede usar:

    ``` bash
    touch database/database.sqlite
    ```

    Y en `.env`:

        DB_CONNECTION=sqlite
        DB_DATABASE=/ruta/absoluta/database.sqlite

7.  **Ejecutar migraciones**

    ``` bash
    php artisan migrate
    ```

8.  **Levantar el servidor**

     ``` bash
    composer run dev
    ```
    o si falla ese comando:

    ``` bash
    php artisan serve
    ```

9.  **Compilar assets (si aplica)**

    ``` bash
    npm run dev
    ```

## **Pasos para trabajar con el proyecto**

### **1. Clonar el repositorio**

```bash
git clone git@github.com:DonMojitos/Quacker.git
```

* Idealmente usaremos la forma SSH para no tener que escribir usuario y contraseña a cada rato

### **2. Crear nueva rama para la feature**

```bash
git checkout -b feature/nombre-de-la-feature
```

### **3. Subir los cambios**

```bash
git add .
git commit -m "descripción del cambio"
git push -u origin feature/nombre-de-la-feature
```

### **4. Crear una Pull Request**

* Desde GitHub, abre una pull request desde tu rama hacia `develop`.
* Esperar la aprobación de alguien más, mejor evitar historias raras y perdidas de tiempo.

### **5. Resolver conflictos (si es que hay)**

Antes de hacer merge, actualiza tu rama con lo último de `develop`:

```bash
git fetch
git pull origin develop
```

Resuelve los conflictos, haz commit y sube los cambios.

### **6. Merge a `develop`**

Solo se hace **cuando la pull request esté revisado y aprobado**.

### **7. Merge a `main`**

Solo se hace **el código sepamos que funka chido**.

