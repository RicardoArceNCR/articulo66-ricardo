# AI_WORKFLOW.md

## 🤖 Propósito
Este archivo tiene como objetivo proporcionar a una inteligencia artificial (IA) el contexto y las instrucciones necesarias para colaborar eficazmente en el desarrollo de este tema personalizado de WordPress usando el framework **Sage**.

---

## 🚀 Objetivo del Proyecto
Crear un tema personalizado de WordPress basado en un diseño de Figma, utilizando el framework **Sage**, **Blade** como motor de plantillas, y **Tailwind CSS** como sistema de estilos. Todo el desarrollo se realiza localmente y posteriormente se desplegará en un servidor de prueba.

---

## 🔧 Herramientas Utilizadas
- **WordPress** (como CMS base)
- **Sage** (roots.io/sage)
- **Blade** (motor de plantillas)
- **Tailwind CSS** (framework CSS)
- **Composer** (gestor de dependencias PHP)
- **npm/yarn** (gestor de paquetes JS)
- **LocalWP / DevKinsta** (entorno local)
- **Cursor** (IDE basado en VS Code)

---

## 📖 Convenciones de trabajo
- Todo el código debe seguir el estilo de Sage + Tailwind.
- Usar `@include` para incluir componentes parciales.
- Todos los estilos deben escribirse como clases utilitarias (no CSS custom, salvo casos especiales).
- El HTML debe ir dentro de los archivos `.blade.php`.
- Los campos personalizados deben integrarse usando ACF (`get_field`).

---

## 🔢 Comandos de desarrollo
```bash
composer install       # instalar dependencias PHP
npm install            # instalar dependencias JS
npm run dev            # desarrollo con hot reload
npm run build          # compilación para producción
```

---

## 🔄 Flujo de trabajo para IA
1. Recibir descripciones de componentes o pantallas (extraídas de Figma).
2. Generar HTML estructurado en Blade.
3. Aplicar clases Tailwind para el diseño.
4. Usar funciones nativas de WordPress/Sage para mostrar contenido dinámico (`get_the_title`, `get_field`, etc).
5. Dividir lógicamente en parciales (header, footer, hero, cards, etc).
6. En caso de dudas estructurales, sugerir la mejor práctica.

---

## 💪 Responsabilidades esperadas de la IA
- Convertir vistas de Figma a Blade.
- Asistir en la estructura de archivos.
- Optimizar el uso de Tailwind.
- Integrar campos personalizados.
- Preparar el tema para producción (build limpio).

---

## 🌐 Preparación para despliegue
- Compilar el tema localmente con `npm run build`
- Subir sólo los archivos necesarios (evitar node_modules, etc)
- Verificar que `composer install` funciona correctamente en el servidor

---

## 🙏 Notas finales
Este archivo debe mantenerse actualizado a medida que el proyecto avanza. Puedes preguntar a la IA sobre cualquier componente, lógica, estructura o ayuda en tiempo real.
