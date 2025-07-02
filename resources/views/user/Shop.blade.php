@extends('includes.main')

@section('title')
 Shop Page   
@endsection


@section('content')
   
    @section('nav')
        @include('user.partials.nav')
    @endsection

  <main class="bg-gray-50 pt-24 w-full px-0 dark:bg-gray-900">
    <div class="flex flex-col md:flex-row gap-8 w-full max-w-[1800px] mx-auto px-4">
      <!-- Filter Sidebar -->
      <aside class="md:w-64 w-full mb-6 md:mb-0 dark:bg-gray-800 bg-white rounded-xl shadow p-6">
        <div class="bg-white rounded-xl shadow p-6 mb-6 dark:bg-gray-600 text-white">
          <h3 class="font-semibold text-lg mb-4 ">Search</h3>
          <input id="searchInput" type="text" placeholder="Search products..." class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-primary" />
        </div>
        <div class="bg-white rounded-xl shadow p-6 mb-6 dark:bg-gray-600">
          <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-white">Category</h3>
          <div class="flex flex-col gap-2">
            <label class="flex items-center text-gray-700 dark:text-white"><input type="checkbox" class="category-filter mr-2 accent-primary" value="Men" checked /> Men</label>
            <label class="flex items-center text-gray-700 dark:text-white"><input type="checkbox" class="category-filter mr-2 accent-primary" value="Women" checked /> Women</label>
            <label class="flex items-center text-gray-700 dark:text-white"><input type="checkbox" class="category-filter mr-2 accent-primary" value="Shoes" checked /> Shoes</label>
            <label class="flex items-center text-gray-700 dark:text-white"><input type="checkbox" class="category-filter mr-2 accent-primary" value="Accessories" checked /> Accessories</label>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 mb-6 dark:bg-gray-600 text-white">
          <h3 class="font-semibold text-lg mb-4 dark:bg-gray-600 ">Price</h3>
          <input id="priceRange" type="range" min="0" max="200" value="200" class="w-full accent-primary" />
          <div class="flex justify-between text-sm mt-2">
            <span>$0</span>
            <span id="priceValue">$200</span>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow p-6 dark:bg-gray-600">
          <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-white">Rating</h3>
          <div class="flex flex-col gap-2">
            <label class="flex items-center text-gray-700 dark:text-white"><input type="radio" name="rating" class="rating-filter mr-2 accent-primary" value="4" /> 4★ & up</label>
            <label class="flex items-center text-gray-700 dark:text-white"><input type="radio" name="rating" class="rating-filter mr-2 accent-primary" value="3" /> 3★ & up</label>
            <label class="flex items-center text-gray-700 dark:text-white"><input type="radio" name="rating" class="rating-filter mr-2 accent-primary" value="2" /> 2★ & up</label>
            <label class="flex items-center text-gray-700 dark:text-white"><input type="radio" name="rating" class="rating-filter mr-2 accent-primary" value="1" /> 1★ & up</label>
            <label class="flex items-center text-gray-700 dark:text-white"><input type="radio" name="rating" class="rating-filter mr-2 accent-primary" value="0" checked /> All</label>
          </div>
        </div>
      </aside>
      <!-- Product Grid + Sort -->
      <section class="flex-1">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
          <h2 class="text-2xl font-bold dark:text-white">All Products</h2>
          <div class="flex items-center gap-2">
            <label for="sortSelect" class="text-sm font-medium dark:text-white">Sort by:</label>
            <select id="sortSelect" class="px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-primary">
              <option value="popularity">Popularity</option>
              <option value="price-asc">Price: Low to High</option>
              <option value="price-desc">Price: High to Low</option>
            </select>
          </div>
        </div>
        <div id="productGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          <!-- Product cards will be rendered here by JS -->
          @foreach($products as $product)
                <div  class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center hover:shadow-2xl transition cursor-pointer group border border-gray-100 dark:bg-gray-600">
                    @php
                        $firstImage = $product->images->first();
                    @endphp

                    <img src="{{ $firstImage ? asset('storage/' . $firstImage->image_path) : asset('images/placeholder.png') }}"
                        alt="Product Image"
                        class="w-96 h-40 object-cover rounded-xl mb-4 group-hover:scale-105 transition-transform shadow" 
                        />
                   {{-- <span class="font-semibold text-lg mb-1">{{$product->name}}</span> --}}
                   <span class="text-primary font-bold text-xl mb-1 dark:text-wite">{{$product->name}}</span>
                   <p class="text-gray-500 text-sm mb-3 text-center min-h-[40px] dark:text-white">{!! nl2br(e(Str::limit($product->description, 40))) !!}</p>
                   <div class="flex items-center mb-2">$ {{$product->price}}</div>
                    <a href="{{route('productDetails',$product->id)}}" class="group bg-gradient-to-r from-blue-600 to-blue-400 text-white rounded-lg px-4 py-1.5 text-lg font-bold shadow hover:from-blue-700 hover:to-blue-500 transition-all duration-200 w-full md:w-auto flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-blue-200">View</a>
                </div>
          @endforeach
        </div>
      </section>
    </div>
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
  @section('user_shop_js')
    <script src="{{ asset('js/shop_script.js') }}"></script>
  @endsection
</body>
</html> 

@endsection