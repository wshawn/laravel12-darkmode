(function () {
    const key = 'theme-preference';
    const html = document.documentElement;
    const saved = localStorage.getItem(key);
    const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    let dark = saved ? saved === 'dark' : prefersDark;
    if (dark) html.classList.add('dark');
    window.toggleDark = function () {
        const isDark = html.classList.toggle('dark');
        localStorage.setItem(key, isDark ? 'dark' : 'light');
    };
})();
