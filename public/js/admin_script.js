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
        openSidebarBtn.addEventListener('click', function () {
            sidebar.classList.remove('-translate-x-full');
        });
    }

    if (closeSidebarBtn && sidebar) {
        closeSidebarBtn.addEventListener('click', function () {
            sidebar.classList.add('-translate-x-full');
        });
    }

    // Profile menu toggle
    if (profileMenuBtn && profileMenu) {
        profileMenuBtn.addEventListener('click', function () {
            profileMenu.classList.toggle('hidden');
        });

        // Close profile menu when clicking outside
        document.addEventListener('click', function (event) {
            if (!profileMenuBtn.contains(event.target) && !profileMenu.contains(event.target)) {
                profileMenu.classList.add('hidden');
            }
        });
    }
    const modal = document.getElementById('addCategoryModal');
    const openBtn = document.getElementById('openAddCategory');
    const closeBtn = document.getElementById('closeModal');
    if (openBtn) {
        openBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });
    }
    if (closeBtn) {
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
        thumb.addEventListener('click', function () {
            mainImage.src = this.src;
            thumbnails.forEach(t => t.classList.remove('ring-2', 'ring-blue-500', 'scale-105'));
            this.classList.add('ring-2', 'ring-blue-500', 'scale-105');
        });
    });


});

function toggleAddProductModal() {
    const modal = document.getElementById('addProductModal');
    if (modal) modal.classList.toggle('hidden');
}

// Logic for Edit Order Modal
document.addEventListener("DOMContentLoaded", () => {
    const editOrderModal = document.getElementById('editOrderModal');
    const editBtns = document.querySelectorAll('.edit-order-btn');
    const closeEditOrderBtn = document.getElementById('closeEditOrderModal');
    const editModalOverlay = document.getElementById('editModalOverlay');
    const saveOrderBtn = document.getElementById('saveOrderBtn');

    // Inputs
    const orderIdInput = document.getElementById('edit_order_id');
    const customerNameInput = document.getElementById('edit_customer_name');
    const orderStatusInput = document.getElementById('edit_order_status');
    const orderTotalInput = document.getElementById('edit_order_total');

    
    function openEditModal(btn) {
        const id = btn.getAttribute('data-order-id');
        const name = btn.getAttribute('data-customer-name');
        const status = btn.getAttribute('data-order-status');
        const total = btn.getAttribute('data-order-total');
        
        // console.log(" id :" +id + " name :" +  name + " status: " + status + " total: " + total);
        
        if (orderIdInput) orderIdInput.value = id;
        if (customerNameInput) customerNameInput.value = name;
        if (orderStatusInput) orderStatusInput.value = status;
        if (orderTotalInput) orderTotalInput.value = total;

        if (editOrderModal) editOrderModal.classList.remove('hidden');
    }

    function closeEditModal() {
        if (editOrderModal) editOrderModal.classList.add('hidden');
    }

    editBtns.forEach(btn => {
        btn.addEventListener('click', () => openEditModal(btn));
    });

    if (closeEditOrderBtn) {
        closeEditOrderBtn.addEventListener('click', closeEditModal);
    }

    if (editModalOverlay) {
        editModalOverlay.addEventListener('click', closeEditModal);
    }

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && editOrderModal && !editOrderModal.classList.contains('hidden')) {
            closeEditModal();
        }
    });

    if (saveOrderBtn) {
        saveOrderBtn.addEventListener('click', () => {
            // Placeholder for save logic
            // console.log('Saving order...', {
            //     id: orderIdInput.value,
            //     status: orderStatusInput.value,

            // });
            // Here you would typically send an AJAX request to update the order
            // For now, we just close the modal
            // closeEditModal();
            // alert('Order status updated (Simulated)');
            // Optionally reload or update the table row logic here
        });
    }
});

const addProductBtn = document.querySelector('button'); // Note: This might be too generic if there are multiple buttons, ensuring it targets the right one is important but keeping as is for now based on existing code.
if (addProductBtn) {
    addProductBtn.addEventListener('click', function () {
        // toggleAddProductModal(); // This seems to be for a different functionality not present in the provided snippet's context fully, but respecting existing structure.
        // Checked and the previous code had this generic selector. Keeping it but wrapping in a check.
        toggleAddProductModal();
    });
}
