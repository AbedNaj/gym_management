import './bootstrap';
import '../css/app.css'

document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("theme-toggle");
    const themeIcon = document.getElementById("theme-icon");
    const htmlElement = document.documentElement;

    // التحقق من الوضع المخزن في Local Storage
    if (localStorage.getItem("theme") === "light") {
        htmlElement.classList.remove("dark");
        themeIcon.textContent = "☀️";
    } else {
        htmlElement.classList.add("dark");
        themeIcon.textContent = "🌙";
    }

    // تغيير الثيم عند الضغط على الزر
    themeToggle.addEventListener("click", () => {
        if (htmlElement.classList.contains("dark")) {
            htmlElement.classList.remove("dark");
            localStorage.setItem("theme", "light");
            themeIcon.textContent = "☀️";
        } else {
            htmlElement.classList.add("dark");
            localStorage.setItem("theme", "dark");
            themeIcon.textContent = "🌙";
        }
    });
});


// Dark Mode Toggle
const darkModeToggle = document.getElementById('darkModeToggle');
let isDarkMode = localStorage.getItem('darkMode') === 'true';

function toggleDarkMode() {
    isDarkMode = !isDarkMode;
    document.documentElement.classList.toggle('dark', isDarkMode);
    localStorage.setItem('darkMode', isDarkMode);
}

// Mobile Menu Toggle
const mobileMenuButton = document.getElementById('mobileMenuButton');
const sidebar = document.getElementById('sidebar');

function toggleMobileMenu() {
    sidebar.classList.toggle('open');
}

// Event Listeners
darkModeToggle.addEventListener('click', toggleDarkMode);
mobileMenuButton.addEventListener('click', toggleMobileMenu);

// Close mobile menu on outside click
document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !mobileMenuButton.contains(e.target)) {
        sidebar.classList.remove('open');
    }
});

// Initialize dark mode
document.documentElement.classList.toggle('dark', isDarkMode);