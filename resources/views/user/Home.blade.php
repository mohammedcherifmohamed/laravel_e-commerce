@extends('includes.main')

@section('title')
 Home Page   
@endsection


@section('content')


  <!-- Sticky Navbar -->
    @section('nav')
        @include('user.partials.nav')
    @endsection
  <main class="pt-20 bg-gray-50 dark:bg-gray-900">
    <!-- Hero Banner -->
    <section class="relative bg-gradient-to-br from-primary to-indigo-200 dark:from-gray-800 dark:to-gray-900 rounded-3xl mx-4 mt-6 overflow-hidden shadow-xl">
      <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center py-16 px-6 gap-10">
        <div class="flex-1">
          <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight text-gray-900 dark:text-white">Discover the Latest in <span class="text-primary">Style</span></h1>
          <p class="text-lg md:text-xl mb-8 text-gray-700 dark:text-gray-200">Shop premium products from top brands. Elevate your wardrobe with our new arrivals and exclusive collections.</p>
          <a href="{{route('shop')}}" class="inline-block px-8 py-3 bg-primary text-white font-semibold rounded-lg shadow hover:bg-primary-dark transition text-lg focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:bg-primary dark:text-white dark:hover:bg-primary-dark">Shop Now</a>
        </div>
        <div class="flex-1 flex justify-center">
          <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=600&q=80" alt="Hero" class="rounded-2xl shadow-lg w-full max-w-md object-cover" />
        </div>
      </div>
    </section>
    <!-- Featured Categories -->
    <section class="max-w-7xl mx-auto mt-16 px-4">
      <h2 class="text-2xl md:text-3xl font-bold mb-8 text-gray-900 dark:text-white">Featured Categories</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 flex flex-col items-center hover:shadow-lg transition cursor-pointer">
          <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80" alt="Men" class="w-16 h-16 rounded-full mb-4" />
          <span class="font-semibold text-lg text-gray-800 dark:text-white">Men</span>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 flex flex-col items-center hover:shadow-lg transition cursor-pointer">
          <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80" alt="Women" class="w-16 h-16 rounded-full mb-4" />
          <span class="font-semibold text-lg text-gray-800 dark:text-white">Women</span>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 flex flex-col items-center hover:shadow-lg transition cursor-pointer">
          <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80" alt="Shoes" class="w-16 h-16 rounded-full mb-4" />
          <span class="font-semibold text-lg text-gray-800 dark:text-white">Shoes</span>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 flex flex-col items-center hover:shadow-lg transition cursor-pointer">
          <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80" alt="Accessories" class="w-16 h-16 rounded-full mb-4" />
          <span class="font-semibold text-lg text-gray-800 dark:text-white">Accessories</span>
        </div>
      </div>
    </section>
    <!-- New Arrivals / Trending Carousel -->
    <section class="max-w-7xl mx-auto mt-16 px-4">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">New Arrivals</h2>
        <div class="flex gap-2">
          <button id="carouselPrev" class="p-2 rounded-full bg-gray-200 hover:bg-primary hover:text-white transition dark:bg-gray-700 dark:hover:bg-primary dark:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg></button>
          <button id="carouselNext" class="p-2 rounded-full bg-gray-200 hover:bg-primary hover:text-white transition dark:bg-gray-700 dark:hover:bg-primary dark:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg></button>
        </div>
      </div>
      <div id="carousel" class="relative overflow-hidden">
        <div id="carouselInner" class="flex transition-transform duration-500 gap-6">
          <!-- Carousel items (JS will handle sliding) -->
          <div class="carousel-item min-w-[250px] max-w-xs bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex flex-col items-center hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80" alt="Product 1" class="w-32 h-32 object-cover rounded mb-4" />
            <span class="font-semibold text-lg mb-2 text-gray-800 dark:text-white">Premium Jacket</span>
            <span class="text-primary font-bold text-xl mb-2">$129</span>
            <a href="product.html" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark transition focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:bg-primary dark:text-white dark:hover:bg-primary-dark">View</a>
          </div>
          <div class="carousel-item min-w-[250px] max-w-xs bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex flex-col items-center hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80" alt="Product 2" class="w-32 h-32 object-cover rounded mb-4" />
            <span class="font-semibold text-lg mb-2 text-gray-800 dark:text-white">Classic Sneakers</span>
            <span class="text-primary font-bold text-xl mb-2">$89</span>
            <a href="product.html" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark transition focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:bg-primary dark:text-white dark:hover:bg-primary-dark">View</a>
          </div>
          <div class="carousel-item min-w-[250px] max-w-xs bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex flex-col items-center hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80" alt="Product 3" class="w-32 h-32 object-cover rounded mb-4" />
            <span class="font-semibold text-lg mb-2 text-gray-800 dark:text-white">Leather Bag</span>
            <span class="text-primary font-bold text-xl mb-2">$59</span>
            <a href="product.html" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark transition focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:bg-primary dark:text-white dark:hover:bg-primary-dark">View</a>
          </div>
          <div class="carousel-item min-w-[250px] max-w-xs bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex flex-col items-center hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=300&q=80" alt="Product 4" class="w-32 h-32 object-cover rounded mb-4" />
            <span class="font-semibold text-lg mb-2 text-gray-800 dark:text-white">Smart Watch</span>
            <span class="text-primary font-bold text-xl mb-2">$199</span>
            <a href="product.html" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary-dark transition focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:bg-primary dark:text-white dark:hover:bg-primary-dark">View</a>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Login/Register Modal (hidden by default) -->
  <div id="authModal" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8 relative">
      <button id="closeAuth" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
      <div class="flex gap-4 mb-6">
        <button id="tabLogin" class="flex-1 py-2 font-semibold border-b-2 border-primary text-primary">Login</button>
        <button id="tabRegister" class="flex-1 py-2 font-semibold border-b-2 border-transparent text-gray-500">Register</button>
      </div>
      <form id="loginForm" class="space-y-4">
        <input type="email" placeholder="Email" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-primary" required />
        <input type="password" placeholder="Password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-primary" required />
        <button type="submit" class="w-full py-2 bg-primary text-white rounded font-semibold hover:bg-primary-dark transition">Login</button>
      </form>
      <form id="registerForm" class="space-y-4 hidden">
        <input type="text" placeholder="Name" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-primary" required />
        <input type="email" placeholder="Email" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-primary" required />
        <input type="password" placeholder="Password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-primary" required />
        <button type="submit" class="w-full py-2 bg-primary text-white rounded font-semibold hover:bg-primary-dark transition">Register</button>
      </form>
    </div>
  </div>
  @section('user_home_js')
    <script src="{{ asset('js/home_script.js') }}"></script>
  @endsection


@endsection

