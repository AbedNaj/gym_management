import './bootstrap';
import '../css/app.css'
import './confirmation';
import Alpine from 'alpinejs';

import { initTheme, setupThemeToggle } from './theme';

initTheme();

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    setupThemeToggle();
});