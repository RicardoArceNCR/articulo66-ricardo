import Alpine from 'alpinejs';

// Inicializar Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Importar assets
import.meta.glob([
  '../images/**',
  '../fonts/**',
]);
