# Quacker

Quacker es una aplicación estilo Twitter creada para la asignatura de entorno servidor en DAW 25/26.

Para mantener la rama 'main' limpia os recomiendo el siguiente flujo de trabajo:

### Rama main

* Contiene únicamente código que se haya aprobado.
* La dejo bloqueada para evitar "pushes" directos, como un por si acaso.
* Solo recibe cambios mediante **Pull Requests revisados por nosotros**.

### Ramas de características ('feature/*')

Cada nueva funcionalidad se desarrolla, idealmente, en una rama independiente.
No es obligatorio pero así nos vamos a ahorrar mareos de cabeza.

Formato recomendado:

feature/nombre-de-la-feature

Ejemplos:

feature/login
feature/feed
feature/perfil-usuario

## **Pasos para trabajar con el proyecto**

### **1. Clonar el repositorio**

git clone git@github.com:DonMojitos/Quacker.git

**Idealmente usaremos la forma SSH para no tener que escribir usuario y contraseña a cada rato**

### **2. Crear nueva rama para la feature**

```bash
git checkout -b feature/nombre-de-la-feature
```

### **3. Subir tus cambios**

```bash
git add .
git commit -m "feat: descripción del cambio"
git push -u origin feature/nombre-de-la-feature
```

### **4. Crear un Pull Request (PR)**

* Desde GitHub, abre un PR desde tu rama hacia `main`.
* Espera la revisión y aprobación de, al menos, otro miembro del equipo.

### **5. Resolver conflictos *(si los hay)***

Antes de hacer merge, actualiza tu rama con lo último de `main`:

```bash
git fetch
git pull origin main
```

Resuelve los conflictos, haz commit y sube los cambios.

### **6. Merge a `main`**

Solo se hace **cuando el PR esté revisado y aprobado**.

---

## 🔐 **Protección de ramas**

La rama `main` debe estar protegida:

* ❌ No se permiten pushes directos.
* ✔ Requiere al menos una revisión en todos los PR.
* ✔ Requiere que los tests (si existen) pasen.

Esto evita pérdida de código y mantiene calidad.

---

## 📝 **Convención de commits (opcional, recomendada)**

Utilizamos **Conventional Commits**:

* `feat:` → Nueva funcionalidad
* `fix:` → Correcciones de errores
* `refactor:` → Cambios internos sin modificar funcionalidad
* `docs:` → Cambios en documentación

Ejemplo:

```
feat: añadir sistema de likes
fix: corregido bug en autenticación
```

---

## 👥 **Normas básicas del equipo**

* PRs pequeños y frecuentes.
* Revisar PRs de compañeros.
* No dejar ramas abandonadas.
* Usar nombres claros tanto en ramas como commits.

---

## 📦 **Pendiente de añadir**

* Requerimientos del entorno de desarrollo.
* Estructura de carpetas del proyecto.
* Guía de estilo del código.
* Checklist para revisar Pull Requests.

---

Si quieres, puedo ampliarlo con secciones como *setup del entorno*, *estilo de código*, *estructura del backend/frontend*, o añadir un CI/CD básico.
