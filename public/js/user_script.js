// User-side dark mode toggle logic

document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById('darkModeToggle');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    const toggleBtnMobile = document.getElementById('darkModeToggleMobile');
    const sunIconMobile = document.getElementById('sunIconMobile');
    const moonIconMobile = document.getElementById('moonIconMobile');

    function applyTheme(isDark) {
        if (isDark) {
            document.documentElement.classList.add('dark');
            if (sunIcon) sunIcon.classList.remove('hidden');
            if (moonIcon) moonIcon.classList.add('hidden');
            if (sunIconMobile) sunIconMobile.classList.remove('hidden');
            if (moonIconMobile) moonIconMobile.classList.add('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            if (sunIcon) sunIcon.classList.add('hidden');
            if (moonIcon) moonIcon.classList.remove('hidden');
            if (sunIconMobile) sunIconMobile.classList.add('hidden');
            if (moonIconMobile) moonIconMobile.classList.remove('hidden');
        }
    }

    // Load theme preference
    const saved = localStorage.getItem('darkMode');
    const isDark = saved === 'true'; // Only use dark if explicitly set
    applyTheme(isDark);

    // Toggle
    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            const nowDark = !document.documentElement.classList.contains('dark');
            localStorage.setItem('darkMode', nowDark);
            applyTheme(nowDark);
        });
    }

    if (toggleBtnMobile) {
        toggleBtnMobile.addEventListener('click', () => {
            const nowDark = !document.documentElement.classList.contains('dark');
            localStorage.setItem('darkMode', nowDark);
            applyTheme(nowDark);
        });
    }

    // Ensure icons are updated when mobile menu is opened
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileMenu) {
        const observer = new MutationObserver(() => {
            // When mobile menu is shown, update icons to match current theme
            const isDark = document.documentElement.classList.contains('dark');
            applyTheme(isDark);
        });
        observer.observe(mobileMenu, { attributes: true, attributeFilter: ['class'] });
    }
}); 