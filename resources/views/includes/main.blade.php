<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Ensure smooth transitions for dark mode */
        * {
            transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
        }
    </style>
</head>
<body class="h-full font-inter bg-gray-50 dark:bg-gray-900">

    @yield('nav')

    @yield('content')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const toggleBtn = document.getElementById('darkModeToggle');
            const sunIcon = document.getElementById('sunIcon');
            const moonIcon = document.getElementById('moonIcon');

            function applyTheme(isDark) {
                if (isDark) {
                    document.documentElement.classList.add('dark');
                    if (sunIcon) sunIcon.classList.remove('hidden');
                    if (moonIcon) moonIcon.classList.add('hidden');
                } else {
                    document.documentElement.classList.remove('dark');
                    if (sunIcon) sunIcon.classList.add('hidden');
                    if (moonIcon) moonIcon.classList.remove('hidden');
                }
            }

            // Load theme preference
            const saved = localStorage.getItem('darkMode');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const isDark = saved === 'true' || (!saved && prefersDark);
            applyTheme(isDark);

            // Toggle
            if (toggleBtn) {
                toggleBtn.addEventListener('click', () => {
                    const nowDark = !document.documentElement.classList.contains('dark');
                    localStorage.setItem('darkMode', nowDark);
                    applyTheme(nowDark);
                });
            }

            // Sidebar functionality
            const openSidebarBtn = document.getElementById('openSidebar');
            const closeSidebarBtn = document.getElementById('closeSidebar');
            const sidebar = document.getElementById('sidebar');
            const profileMenuBtn = document.getElementById('profileMenuBtn');
            const profileMenu = document.getElementById('profileMenu');

            // Sidebar toggle
            if (openSidebarBtn && sidebar) {
                openSidebarBtn.addEventListener('click', function() {
                    sidebar.classList.remove('-translate-x-full');
                });
            }

            if (closeSidebarBtn && sidebar) {
                closeSidebarBtn.addEventListener('click', function() {
                    sidebar.classList.add('-translate-x-full');
                });
            }

            // Profile menu toggle
            if (profileMenuBtn && profileMenu) {
                profileMenuBtn.addEventListener('click', function() {
                    profileMenu.classList.toggle('hidden');
                });

                // Close profile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!profileMenuBtn.contains(event.target) && !profileMenu.contains(event.target)) {
                        profileMenu.classList.add('hidden');
                    }
                });
            }
        });
        document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('addCategoryModal');
        const openBtn = document.getElementById('openAddCategory');
        const closeBtn = document.getElementById('closeModal');
        if(openBtn){
            openBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });
        }
        if(closeBtn){
        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
    function toggleAddProductModal() {
        const modal = document.getElementById('addProductModal');
        modal.classList.toggle('hidden');
    }

    document.querySelector('button').addEventListener('click', function () {
        toggleAddProductModal();
    });

    </script>

</body>
</html>