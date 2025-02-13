import './bootstrap';
import '../css/app.css'

import { initTheme, setupThemeToggle } from './theme';

// تهيئة الثيم فوراً
initTheme();

// انتظار تحميل DOM
document.addEventListener('DOMContentLoaded', () => {
    setupThemeToggle();
});