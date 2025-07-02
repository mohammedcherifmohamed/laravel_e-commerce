// Product data (mock)
const products = [
  { id: 1, name: 'Premium Jacket', price: 129, category: 'Men', rating: 4, image: 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80', description: 'A premium, water-resistant jacket for all seasons.' },
  { id: 2, name: 'Classic Sneakers', price: 89, category: 'Women', rating: 5, image: 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80', description: 'Timeless sneakers with a modern twist and all-day comfort.' },
  { id: 3, name: 'Leather Bag', price: 59, category: 'Accessories', rating: 3, image: 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80', description: 'Handcrafted leather bag, perfect for work or travel.' },
  { id: 4, name: 'Smart Watch', price: 199, category: 'Accessories', rating: 4, image: 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80', description: 'Stay connected and track your fitness with style.' },
  { id: 5, name: 'Running Shoes', price: 99, category: 'Shoes', rating: 5, image: 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80', description: 'Lightweight running shoes for maximum performance.' },
  { id: 6, name: 'Denim Jeans', price: 79, category: 'Men', rating: 4, image: 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80', description: 'Classic fit denim jeans with a modern cut.' },
  { id: 7, name: 'Summer Dress', price: 69, category: 'Women', rating: 5, image: 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80', description: 'Breezy summer dress for effortless style.' },
  { id: 8, name: 'Leather Belt', price: 39, category: 'Accessories', rating: 3, image: 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80', description: 'Premium leather belt to complete your look.' },
];

document.addEventListener('DOMContentLoaded', function() {
  // Filtering logic
  const productGrid = document.getElementById('productGrid');
  const searchInput = document.getElementById('searchInput');
  const categoryFilters = document.querySelectorAll('.category-filter');
  const priceRange = document.getElementById('priceRange');
  const priceValue = document.getElementById('priceValue');
  const ratingFilters = document.querySelectorAll('.rating-filter');
  const sortSelect = document.getElementById('sortSelect');

  function renderProducts(list) {
    productGrid.innerHTML = list.map(p => `
      <div class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center hover:shadow-2xl transition cursor-pointer group border border-gray-100 dark:bg-gray-600">
        <img src="${p.image}" alt="${p.name}" class="w-36 h-36 object-cover rounded-xl mb-4 group-hover:scale-105 transition-transform shadow" />
        <span class="text-primary font-bold text-xl mb-1 dark:text-white">${p.name}</span>
        <p class="text-gray-500 text-sm mb-3 text-center min-h-[40px] dark:text-white">${p.description}</p>
        <div class="flex items-center mb-2 text-lg font-semibold text-gray-800 dark:text-white">$ ${p.price}</div>
        <a href="product.html?id=${p.id}" class="px-5 py-2 rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-bold shadow hover:from-blue-600 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all">View</a>
      </div>
    `).join('');
  }

  function filterProducts() {
    let filtered = products.filter(p => {
      // Category
      const checkedCats = Array.from(categoryFilters).filter(cb => cb.checked).map(cb => cb.value);
      if (!checkedCats.includes(p.category)) return false;
      // Price
      if (p.price > priceRange.value) return false;
      // Rating
      const rating = Number(document.querySelector('.rating-filter:checked').value);
      if (p.rating < rating) return false;
      // Search
      if (searchInput.value && !p.name.toLowerCase().includes(searchInput.value.toLowerCase())) return false;
      return true;
    });
    // Sort
    if (sortSelect.value === 'price-asc') filtered.sort((a,b) => a.price-b.price);
    else if (sortSelect.value === 'price-desc') filtered.sort((a,b) => b.price-a.price);
    else filtered.sort((a,b) => b.rating-a.rating);
    renderProducts(filtered);
  }

  searchInput.oninput = filterProducts;
  categoryFilters.forEach(cb => cb.onchange = filterProducts);
  priceRange.oninput = () => { priceValue.textContent = `$${priceRange.value}`; filterProducts(); };
  ratingFilters.forEach(rb => rb.onchange = filterProducts);
  sortSelect.onchange = filterProducts;
  // Initial render
  filterProducts();

  // Cart count demo
  document.querySelectorAll('#cartCount, #cartCountMobile').forEach(el => el.textContent = '2');

  // User dropdown logic
  const userDropdown = document.getElementById('userDropdown');
  const userName = document.getElementById('userName');
  const loginBtn = document.getElementById('loginBtn');
  const logoutBtn = document.getElementById('logoutBtn');
  let isLoggedIn = true;
  function updateNavbarUser() {
    if (isLoggedIn) {
      userDropdown.classList.remove('hidden');
      loginBtn.classList.add('hidden');
      userName.textContent = localStorage.getItem('userName') || 'John Doe';
    } else {
      userDropdown.classList.add('hidden');
      loginBtn.classList.remove('hidden');
    }
  }
  updateNavbarUser();
  if (logoutBtn) {
    logoutBtn.onclick = () => {
      isLoggedIn = false;
      localStorage.removeItem('userName');
      updateNavbarUser();
    };
  }
}); 