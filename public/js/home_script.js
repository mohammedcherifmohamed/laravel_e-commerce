// Home page JS logic

document.addEventListener('DOMContentLoaded', function() {
  // Tailwind custom colors
  tailwind.config = { theme: { extend: { colors: { primary: '#6366f1', 'primary-dark': '#4338ca' } } } };
  // Navbar mobile drawer
  const menuBtn = document.getElementById('menuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const closeMenu = document.getElementById('closeMenu');
  if (menuBtn && mobileMenu) menuBtn.onclick = () => mobileMenu.classList.remove('hidden');
  if (closeMenu && mobileMenu) closeMenu.onclick = () => mobileMenu.classList.add('hidden');
  if (mobileMenu) mobileMenu.onclick = (e) => { if (e.target === mobileMenu) mobileMenu.classList.add('hidden'); };
  // Login/Register modal
  const loginBtn = document.getElementById('loginBtn');
  const loginBtnMobile = document.getElementById('loginBtnMobile');
  const authModal = document.getElementById('authModal');
  const closeAuth = document.getElementById('closeAuth');
  if (loginBtn && authModal) loginBtn.onclick = () => authModal.classList.remove('hidden');
  if (loginBtnMobile && mobileMenu && authModal) loginBtnMobile.onclick = () => { mobileMenu.classList.add('hidden'); authModal.classList.remove('hidden'); };
  if (closeAuth && authModal) closeAuth.onclick = () => authModal.classList.add('hidden');
  if (authModal) authModal.onclick = (e) => { if (e.target === authModal) authModal.classList.add('hidden'); };
  // Tabs
  const tabLogin = document.getElementById('tabLogin');
  const tabRegister = document.getElementById('tabRegister');
  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');
  if (tabLogin && tabRegister && loginForm && registerForm) {
    tabLogin.onclick = () => { tabLogin.classList.add('border-primary','text-primary'); tabRegister.classList.remove('border-primary','text-primary'); tabRegister.classList.add('border-transparent','text-gray-500'); loginForm.classList.remove('hidden'); registerForm.classList.add('hidden'); };
    tabRegister.onclick = () => { tabRegister.classList.add('border-primary','text-primary'); tabLogin.classList.remove('border-primary','text-primary'); tabLogin.classList.add('border-transparent','text-gray-500'); registerForm.classList.remove('hidden'); loginForm.classList.add('hidden'); };
  }
  // Carousel logic
  const carouselInner = document.getElementById('carouselInner');
  if (carouselInner) {
    const carouselItems = carouselInner.children;
    let carouselIndex = 0;
    function updateCarousel() {
      const itemWidth = carouselItems[0].offsetWidth + 24; // gap-6 = 24px
      carouselInner.style.transform = `translateX(-${carouselIndex * itemWidth}px)`;
    }
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    if (prevBtn) prevBtn.onclick = () => { carouselIndex = Math.max(0, carouselIndex - 1); updateCarousel(); };
    if (nextBtn) nextBtn.onclick = () => { carouselIndex = Math.min(carouselItems.length - 1, carouselIndex + 1); updateCarousel(); };
    window.addEventListener('resize', updateCarousel);
    updateCarousel();
  }
  // Cart count demo
  document.querySelectorAll('#cartCount, #cartCountMobile').forEach(el => el.textContent = '2');
  // User dropdown logic
  const userDropdown = document.getElementById('userDropdown');
  const userName = document.getElementById('userName');
  const logoutBtn = document.getElementById('logoutBtn');
  const loginBtnNav = document.getElementById('loginBtn');
  let isLoggedIn = true;
  function updateNavbarUser() {
    if (isLoggedIn) {
      if (userDropdown) userDropdown.classList.remove('hidden');
      if (loginBtnNav) loginBtnNav.classList.add('hidden');
      if (userName) userName.textContent = localStorage.getItem('userName') || 'John Doe';
    } else {
      if (userDropdown) userDropdown.classList.add('hidden');
      if (loginBtnNav) loginBtnNav.classList.remove('hidden');
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