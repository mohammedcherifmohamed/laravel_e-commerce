@extends('includes.main')


@section('nav')

  <nav id="navbar" class="fixed top-0 left-0 w-full z-30 bg-white/80 backdrop-blur shadow-sm transition-all">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">
      <a href="index.html" class="text-2xl font-bold tracking-tight">Shoply</a>
      <div class="hidden md:flex gap-8 items-center">
        <button id="darkModeToggle" class="ml-2 p-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600 transition flex items-center">
          <svg id="sunIcon" class="w-5 h-5 mr-1 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
          <svg id="moonIcon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/></svg>
        </button>
        <a href="{{route('home')}}" class="hover:text-primary transition">Home</a>
        <a href="{{route('shop')}}" class="hover:text-primary transition">Shop</a>
        <a href="#" class="hover:text-primary transition">About</a>
        <a href="#" class="hover:text-primary transition">Contact</a>
        @if(Auth::check())

        <div class="relative">
                    <button id="profileMenuBtn" class="flex items-center space-x-2 text-gray-700 dark:text-black hover:text-gray-900 dark:hover:text-gray-700">
                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Admin">
                        <span class="hidden md:block text-sm font-medium">{{Auth::user()->name}}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div id="profileMenu" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-50 hidden">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Settings</a>
                        <a href="{{route('Userlogout')}}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Sign out</a>
                    </div>
        </div>

          
       @else 
          <a  href="{{route('Login_Register')}}" id="loginBtn" class="hover:text-primary transition">Login</a>
        @endif

        <a href="#" id="cartToggleBtn" class="ml-2 relative">
          <svg class="w-6 h-6 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4"/><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/></svg>
          <span id="cartCount" class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full px-1">0</span>
        </a>
      </div>
      <button id="menuBtn" class="md:hidden p-2 rounded focus:outline-none">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
    <!-- Mobile Drawer -->
    <div id="mobileMenu" class="md:hidden fixed inset-0 bg-black/40 z-40 hidden">
      <div class="absolute top-0 right-0 w-64 h-full bg-white shadow-lg p-6 flex flex-col gap-6">
        <button id="closeMenu" class="self-end mb-4">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <a href="index.html" class="hover:text-primary transition">Home</a>
        <a href="shop.html" class="hover:text-primary transition">Shop</a>
        <a href="#" class="hover:text-primary transition">About</a>
        <a href="#" class="hover:text-primary transition">Contact</a>
        <button id="loginBtnMobile" class="px-4 py-2 rounded bg-primary text-white font-semibold hover:bg-primary-dark transition">Login</button>
        <button id="darkModeToggleMobile" class="flex items-center mt-2 px-4 py-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
          <svg id="sunIconMobile" class="w-5 h-5 mr-1 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
          <svg id="moonIconMobile" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/></svg>
        </button>
        <a href="#" id="cartToggleBtnMobile" class="relative">
          <svg class="w-6 h-6 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4"/><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/></svg>
          <span id="cartCountMobile" class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full px-1">0</span>
        </a>
      </div>
    </div>
  </nav>

  <!-- Cart Modal -->
  <div id="cartModal" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-md p-8 relative">
      <button id="closeCart" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 dark:text-gray-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
      <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Your Cart</h2>
      <div id="cartItems" class="mb-6 max-h-60 overflow-y-auto divide-y divide-gray-200 dark:divide-gray-700">
        <!-- Cart items will be rendered here by JS -->
      </div>
      <div class="flex justify-between items-center mb-4">
        <span class="font-semibold text-lg text-gray-700 dark:text-gray-200">Total:</span>
        <span id="cartTotal" class="text-xl font-bold text-primary">$0.00</span>
      </div>
      <button id="checkoutBtn" class="w-full py-3 bg-primary text-white rounded-lg font-semibold text-lg hover:bg-primary-dark transition">Checkout</button>
    </div>
  </div>

@endsection

@section('user_js')
<script src="{{ asset('js/user_script.js') }}"></script>
@endsection

