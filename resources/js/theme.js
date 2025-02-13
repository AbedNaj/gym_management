// theme.js
export function initTheme() {
    // التحقق من الثيم المحفوظ
    if (localStorage.getItem('theme') === 'dark' ||
        (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
}

// دالة لتبديل الثيم
export function setupThemeToggle() {
    const themeToggle = document.getElementById("theme-toggle");
    const themeIcon = document.getElementById("theme-icon");

    if (!themeToggle) return;

    // تحديث الأيقونة عند التحميل
    if (document.documentElement.classList.contains('dark')) {
        themeIcon.textContent = "🌙";
    } else {
        themeIcon.textContent = "☀️";
    }

    themeToggle.addEventListener("click", () => {
        const isDark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        themeIcon.textContent = isDark ? "🌙" : "☀️";
    });
}