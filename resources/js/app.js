import './bootstrap';
import '../css/app.css'
import './confirmation';
import { initTheme, setupThemeToggle } from './theme';

initTheme();

document.addEventListener('DOMContentLoaded', () => {
    setupThemeToggle();
});