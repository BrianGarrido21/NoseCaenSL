# 🏢 NoseCaenSL

![Estado del Proyecto](https://img.shields.io/badge/status-en_desarrollo-yellowgreen)
![GitHub language count](https://img.shields.io/github/languages/count/BrianGarrido21/NoseCaenSL)
![GitHub top language](https://img.shields.io/github/languages/top/BrianGarrido21/NoseCaenSL?color=4FC08D)

Aplicación web para la gestión interna de la empresa "NoseCaenSL". *(Reemplaza esto con una descripción breve: Ej: "Sistema de gestión de inventario, proyectos y facturación...")*

![Captura de pantalla de NoseCaenSL](https://via.placeholder.com/800x400.png?text=Captura+de+pantalla+de+NoseCaenSL)

## ✨ Características Principales

*(Edita esta lista con las funciones de tu app)*
* **Autenticación de Usuarios:** Sistema completo de registro e inicio de sesión (basado en Laravel Jetstream/Breeze).
* **Gestión de Clientes (CRUD):** Módulo para administrar la información de los clientes.
* **Gestión de Proyectos:** Seguimiento de los proyectos activos, asignaciones y estados.
* **Sistema de Inventario:** Control de stock de materiales y herramientas.
* **Gestión de Pagos:** Integración con la pasarela de pagos de PayPal para procesar facturas o servicios.
* **Panel de Administración:** Dashboard con estadísticas y gestión de usuarios.

---

## 🛠️ Tecnologías Utilizadas

Este proyecto está construido como una "Single Page Application (SPA)" monolítica usando Laravel, Vue.js e Inertia.js.

### **Backend (Servidor)**

* **[Laravel](https://laravel.com/)**: Framework de PHP para el desarrollo de la API REST y la lógica de negocio.
* **[PHP](https://www.php.net/)**: Lenguaje de programación del lado del servidor.
* **[MySQL](https://www.mysql.com/)**: Base de datos relacional para almacenar toda la información.
* **[PayPal SDK](https://developer.paypal.com/home/)**: Para la integración y procesamiento de pagos.
* **[Laravel Sanctum/Jetstream](https://laravel.com/docs/sanctum)**: Para la autenticación de usuarios.

### **Frontend (Cliente)**

* **[Vue.js (v3)](https://vuejs.org/)**: Framework progresivo de JavaScript para construir la interfaz de usuario.
* **[Inertia.js](https://inertiajs.com/)**: Actúa como "pegamento" entre el backend de Laravel y el frontend de Vue.js, permitiendo crear una SPA sin construir una API tradicional.
* **[Tailwind CSS](https://tailwindcss.com/)**: Framework de CSS utility-first para un diseño rápido y moderno.
* **[Vite](https://vitejs.dev/)**: Herramienta de frontend para el empaquetado y servidor de desarrollo.

---

## 🚀 Puesta en Marcha y Ejecución Local

Sigue estos pasos para obtener una copia local del proyecto y ponerla en funcionamiento.

### Prerrequisitos

* PHP (v8.1 o superior)
* Composer
* Node.js y npm (o yarn)
* Una base de datos (ej. MySQL)

### Guía de Instalación

1.  **Clona el repositorio:**
    ```bash
    git clone [https://github.com/BrianGarrido21/NoseCaenSL.git](https://github.com/BrianGarrido21/NoseCaenSL.git)
    cd NoseCaenSL
    ```

2.  **Instala dependencias de PHP:**
    ```bash
    composer install
    ```

3.  **Instala dependencias de Node.js:**
    ```bash
    npm install
    ```

4.  **Configura tu entorno:**
    * Copia el archivo de entorno de ejemplo y configúralo.
    ```bash
    cp .env.example .env
    ```
    * Genera la clave de la aplicación:
    ```bash
    php artisan key:generate
    ```

5.  **Configura tu base de datos y PayPal:**
    * Abre el archivo `.env` y añade los datos de tu base de datos (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
    * Añade tus credenciales de la API de PayPal (PAYPAL_CLIENT_ID, PAYPAL_SECRET, PAYPAL_MODE=sandbox).

6.  **Ejecuta las migraciones (y seeders si los tienes):**
    * Esto creará la estructura de la base de datos.
    ```bash
    php artisan migrate --seed
    ```

### Ejecución del Proyecto

1.  **Inicia el servidor de desarrollo de Vite (para CSS/JS):**
    ```bash
    npm run dev
    ```

2.  **Inicia el servidor de Laravel (en otra terminal):**
    ```bash
    php artisan serve
    ```

* La aplicación estará disponible en `http://localhost:8000`.

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

---

## 👤 Contacto

**Brian Garrido Picón**

* GitHub: [@BrianGarrido21](https://github.com/BrianGarrido21)
* LinkedIn: [https://www.linkedin.com/in/brian-garrido-picón-6a0b65217/](https://www.linkedin.com/in/brian-garrido-picón-6a0b65217/)
