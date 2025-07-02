



        document.addEventListener("DOMContentLoaded", () => {
           const products_table = document.getElementById('products_table');
    const search_by_name = document.getElementById('search_by_name');
    const search_by_status = document.getElementById('searchBy_status');
    const search_by_category = document.getElementById('searchBy_category');

    function applyFilters() {
        const nameFilter = search_by_name?.value.toLowerCase() || '';
        const statusFilter = search_by_status?.value || 'all';
        const categoryFilter = search_by_category?.value || 'all';

        const rows = products_table.querySelectorAll('.product-row');

        rows.forEach(row => {
            const nameEl = row.querySelector('.product-name');
            const rowName = nameEl?.textContent.toLowerCase() || '';
            const rowStatus = row.getAttribute('data-status');
            const rowCategory = row.getAttribute('data-category-id');

            const matchesName = rowName.includes(nameFilter);
            const matchesStatus = statusFilter === 'all' || rowStatus === statusFilter;
            const matchesCategory = categoryFilter === 'all' || rowCategory === categoryFilter;

            row.classList.toggle('hidden', !(matchesName && matchesStatus && matchesCategory));
        });
    }

    if (search_by_name) {
        search_by_name.addEventListener('input', applyFilters);
    }

    if (search_by_status) {
        search_by_status.addEventListener('change', applyFilters);
    }

    if (search_by_category) {
        search_by_category.addEventListener('change', applyFilters);
    }

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

         const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    mainImage.src = this.src;
                    thumbnails.forEach(t => t.classList.remove('ring-2', 'ring-blue-500', 'scale-105'));
                    this.classList.add('ring-2', 'ring-blue-500', 'scale-105');
                });
            });


    });
    function toggleAddProductModal() {
        const modal = document.getElementById('addProductModal');
        modal.classList.toggle('hidden');
    }

    document.querySelector('button').addEventListener('click', function () {
        toggleAddProductModal();
    });
