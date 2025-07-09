document.addEventListener('DOMContentLoaded', function() {
  const productGrid = document.getElementById('productGrid');
  const searchInput = document.getElementById('searchInput');
  const priceRange = document.getElementById('priceRange');
  const priceValue = document.getElementById('priceValue');
  const categoryCheckboxes = document.querySelectorAll('input[name="categories[]"]');
  const ratingRadios = document.querySelectorAll('input[name="rating"]');

  function applyFilters() {
    const search = searchInput?.value.toLowerCase() || '';
    const maxPrice = parseFloat(priceRange?.value || 1000);
    const selectedCategories = Array.from(categoryCheckboxes)
      .filter(cb => cb.checked)
      .map(cb => cb.value);
    const selectedRating = parseInt(document.querySelector('input[name="rating"]:checked')?.value || 0);

    const cards = productGrid.querySelectorAll('.product-card');

    cards.forEach(card => {
      const name = card.querySelector('.product-name')?.textContent.toLowerCase() || '';
      const price = parseFloat(card.getAttribute('data-price'));
      const categoryId = card.getAttribute('data-category-id');
      const rating = parseFloat(card.getAttribute('data-rating'));

      const matchesName = name.includes(search);
      const matchesPrice = price <= maxPrice;
      const matchesCategory = selectedCategories.length === 0 || selectedCategories.includes(categoryId);
      const matchesRating = rating >= selectedRating;

      card.classList.toggle('hidden', !(matchesName && matchesPrice && matchesCategory && matchesRating));
    });
  }

  // Live listeners
  searchInput?.addEventListener('input', applyFilters);
  priceRange?.addEventListener('input', () => {
    priceValue.textContent = `$${priceRange.value}`;
    applyFilters();
  });
  categoryCheckboxes.forEach(cb => cb.addEventListener('change', applyFilters));
  ratingRadios.forEach(rb => rb.addEventListener('change', applyFilters));

  applyFilters(); // Run initially

  // Cart count demo
  document.querySelectorAll('#cartCount, #cartCountMobile').forEach(el => el.textContent = '2');

  // User dropdown logic
  const userDropdown = document.getElementById('userDropdown');
  const userName = document.getElementById('userName');
  const loginBtn = document.getElementById('loginBtn');
  const logoutBtn = document.getElementById('logoutBtn');
  let isLoggedIn = true;
  // function updateNavbarUser() {
  //   if (isLoggedIn) {
  //     userDropdown.classList.remove('hidden');
  //     loginBtn.classList.add('hidden');
  //     userName.textContent = localStorage.getItem('userName') || 'John Doe';
  //   } else {
  //     userDropdown.classList.add('hidden');
  //     loginBtn.classList.remove('hidden');
  //   }
  // }
  // updateNavbarUser();
  // if (logoutBtn) {
  //   logoutBtn.onclick = () => {
  //     isLoggedIn = false;
  //     localStorage.removeItem('userName');
  //     updateNavbarUser();
  //   };
  // }
}); 