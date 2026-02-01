document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('theme-toggle');
    if (!btn) return;
    btn.addEventListener('click', () => {
        window.toggleDark?.();
        updateIcons();
    });

    function updateIcons() {
        const isDark = document.documentElement.classList.contains('dark');
        document.getElementById('icon-sun').classList.toggle('hidden', !isDark);
        document.getElementById('icon-moon').classList.toggle('hidden', isDark);
    }

    updateIcons();
});
