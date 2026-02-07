// User-side dark mode toggle logic
function getCart() {
    return JSON.parse(localStorage.getItem('cart') || '[]');
}
function setCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
}
document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById('darkModeToggle');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    const toggleBtnMobile = document.getElementById('darkModeToggleMobile');
    const sunIconMobile = document.getElementById('sunIconMobile');
    const moonIconMobile = document.getElementById('moonIconMobile');
    const profileMenuBtn = document.getElementById('profileMenuBtn');
    const profileMenu = document.getElementById('profileMenu');
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

    // --- CART LOGIC ---
    // Cart state in localStorage


    function updateCartCount() {
        const cart = getCart();
        const count = cart.reduce((sum, item) => sum + item.quantity, 0);
        const cartCount = document.getElementById('cartCount');
        const cartCountMobile = document.getElementById('cartCountMobile');
        if (cartCount) cartCount.textContent = count;
        if (cartCountMobile) cartCountMobile.textContent = count;
    }
    function renderCart() {
        const cart = getCart();
        const cartItems = document.getElementById('cartItems');
        const cartTotal = document.getElementById('cartTotal');
        if (!cartItems || !cartTotal) return;
        cartItems.innerHTML = '';
        let total = 0;
        if (cart.length === 0) {
            cartItems.innerHTML = '<div class="text-gray-500 dark:text-gray-300 text-center py-8">Your cart is empty.</div>';
        } else {
            cart.forEach((item, idx) => {
                total += item.price * item.quantity;
                cartItems.innerHTML += `
                  <div class='item_container flex items-center justify-between py-3'>
                    <div class='flex items-center gap-3'>
                      <img src='${item.image}' class='w-14 h-14 object-cover rounded-lg border' />
                      <div>
                        <div  class='item_name font-semibold text-gray-800 dark:text-white'>${item.name}</div>
                        <div class='item_price text-sm text-gray-500 dark:text-gray-300'>$${item.price} x 
                          <button class="item_decrementQty px-2 py-0.5 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 mx-1" data-idx='${idx}'>-</button>
                          <span class="item_quantity inline-block w-6 text-center">${item.quantity}</span>
                          <button class="incrementQty px-2 py-0.5 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 mx-1" data-idx='${idx}'>+</button>
                        </div>
                      </div>
                    </div>
                    <button class='removeCartItem text-red-500 hover:text-red-700' data-idx='${idx}'>Remove</button>
                  </div>
                `;
            });
        }
        cartTotal.textContent = `$${total.toFixed(2)}`;
    }
    function showCartModal() {
        const cartModal = document.getElementById('cartModal');
        if (cartModal) cartModal.classList.remove('hidden');
        renderCart();
    }
    function hideCartModal() {
        const cartModal = document.getElementById('cartModal');
        if (cartModal) cartModal.classList.add('hidden');
    }
    // Toggle cart modal
    const cartToggleBtn = document.getElementById('cartToggleBtn');
    const cartToggleBtnMobile = document.getElementById('cartToggleBtnMobile');
    if (cartToggleBtn) cartToggleBtn.addEventListener('click', (e) => { e.preventDefault(); showCartModal(); });
    if (cartToggleBtnMobile) cartToggleBtnMobile.addEventListener('click', (e) => { e.preventDefault(); showCartModal(); });
    const closeCart = document.getElementById('closeCart');
    if (closeCart) closeCart.addEventListener('click', hideCartModal);
    // Remove item
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('removeCartItem')) {
            const idx = +e.target.getAttribute('data-idx');
            let cart = getCart();
            cart.splice(idx, 1);
            setCart(cart);
            renderCart();
            updateCartCount();
        }
    });
    // Increment/Decrement quantity
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('incrementQty')) {
            const idx = +e.target.getAttribute('data-idx');
            let cart = getCart();
            cart[idx].quantity += 1;
            setCart(cart);
            renderCart();
            updateCartCount();
        }
        if (e.target.classList.contains('decrementQty')) {
            const idx = +e.target.getAttribute('data-idx');
            let cart = getCart();
            if (cart[idx].quantity > 1) {
                cart[idx].quantity -= 1;
                setCart(cart);
                renderCart();
                updateCartCount();
            }
        }
    });



    // Add to cart logic (to be called from product/shop pages)
    window.addToCart = function (product) {
        let cart = getCart();
        const idx = cart.findIndex(item => item.id === product.id);
        if (idx > -1) {
            cart[idx].quantity += product.quantity || 1;
        } else {
            cart.push({ ...product, quantity: product.quantity || 1 });
        }
        setCart(cart);
        updateCartCount();
    };
    // Update cart count on load
    updateCartCount();

    const cartModal = document.getElementById('cartModal');
    const checkoutModal = document.getElementById('checkoutModal');

    const closeCheckout = document.getElementById('closeCheckout');




    closeCart?.addEventListener('click', function () {
        cartModal.classList.add('hidden');
    });

    closeCheckout?.addEventListener('click', function () {
        checkoutModal.classList.add('hidden');
    });

});

$('#checkoutBtn').on('click', function () {
    console.log('Checkout button clicked');

    var item_container = document.querySelectorAll('.item_container');
    if (item_container.length === 0) {
        alert('Your cart is empty. Please add items to your cart before checking out.');
        return;
    }

    // Show the checkout modal
    const checkoutModal = document.getElementById('checkoutModal');
    if (checkoutModal) {
        checkoutModal.classList.remove('hidden');
    }

    // Render the cart items in the checkout modal
    const checkoutItems = document.getElementById('checkoutItems');
    const checkoutTotal = document.getElementById('checkoutTotal');
    const cart = getCart(); // Make sure this function exists
    checkoutItems.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const itemHTML = `
            <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-600">
                <div class="flex items-center gap-3">
                    <img src="${item.image}" alt="${item.name}" class="w-12 h-12 object-cover rounded" />
                    <div>
                        <div class="font-semibold text-gray-800 dark:text-white">${item.name}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-300">$${item.price} × ${item.quantity}</div>
                    </div>
                </div>
                <div class="font-bold text-gray-800 dark:text-white">$${itemTotal.toFixed(2)}</div>
            </div>
        `;

        checkoutItems.innerHTML += itemHTML;
    });

    checkoutTotal.textContent = `$${total.toFixed(2)}`;
});
document.getElementById('checkoutDeliveryForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    console.log("form submitted");

    const formData = new FormData(this);
    const deliveryData = Object.fromEntries(formData.entries());
    deliveryData.cart = getCart();

    console.log('Submitting checkout with data:', deliveryData);

    fetch(checkoutProcessUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(deliveryData)
    })
        .then(async response => {
            const isJson = response.headers.get('content-type')?.includes('application/json');
            const data = isJson ? await response.json() : null;

            if (!response.ok) {
                const error = (data && data.message) || response.statusText;
                throw new Error(error);
            }

            if (data && data.success) {
                alert("Order placed!");
                localStorage.removeItem('cart');
                window.location.href = "/thank-you";
            } else {
                alert("Error placing order: " + (data?.message || "Unknown error"));
            }
        })
        .catch(error => {
            console.error('Checkout error:', error);
            alert("Something went wrong! Check console for details.");
        });
});


