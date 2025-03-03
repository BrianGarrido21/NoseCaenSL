import './bootstrap';
import Alpine from 'alpinejs';

// Esperar a que Livewire cargue antes de iniciar Alpine.js
document.addEventListener('DOMContentLoaded', () => {
    window.Alpine = Alpine;
    Alpine.start();
});
