@extends('includes.main')


@section('title')
Products Page
@endsection

@section('nav')
    @include('admin.partials.nav')
@endsection

@section('content')

    <div class="flex h-screen">
        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Main Content -->
            <main class="p-6">
                <!-- Header -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Products</h2>
                        <p class="text-gray-600 mt-2 dark:text-white">Manage your product catalog</p>
                    </div>
                    <button onclick="toggleAddProductModal()" class="bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                        Add New Product
                    </button>
                </div>
                    @if(session('success'))
                        <x-alert type="success" >
                            {{ session('success') }}
                        </x-alert>
                    @endif
                    @if(session('error'))
                        <x-alert type="warning" >
                            {{ session('error') }}
                        </x-alert>
                    @endif

                <!-- Add Product Modal -->
                            <div id="addProductModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-50">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
                        <!-- Close Button -->
                        <button onclick="toggleAddProductModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:text-white">
                            &times;
                        </button>

                        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Add New Product</h2>

                        <form action="{{ route('AddProduct') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Product Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                               @error('name')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                              @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Description</label>
                                    <textarea name="description" rows="4" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                                            {{ old('description') }}
                                    </textarea>
                                 @error('description')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Category</label>
                                    <select value="{{ old('category_id') }}" name="category_id" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                 @error('category_id')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Price</label>
                                    <input type="number" step="0.01" value="{{ old('price') }}" name="price" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                                 @error('price')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                              @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Stock Quantity</label>
                                    <input type="number" value="{{ old('quantity') }}" name="quantity" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                                 @error('quantity')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                              @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Status</label>
                                    <select name="status" value="{{ old('status') }}" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                                        <option value="in_stock">In Stock</option>
                                        <option value="out_of_stock">out Of Stock</option>
                                    </select>
                                 @error('status')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                   @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Product Images</label>
                                    <input type="file" name="images[]" multiple class="w-full mt-1">
                                    <p class="text-xs text-gray-500 mt-1">You can select multiple images.</p>
                                @error('images')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                              @enderror
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <button type="button" onclick="toggleAddProductModal()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300">
                                    Cancel
                                </button>
                                <button type="submit" class="bg-primary-600 text-white px-6 py-2 rounded-md hover:bg-primary-700">
                                    Save Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


                <!-- Filters and Search -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 dark:text-white">Search</label>
                            <input type="text" placeholder="Search products..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 dark:text-white">Category</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                             @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2 dark:text-white">Status</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                <option>All Status</option>
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Out of Stock</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-200 transition-colors">
                                Apply Filters
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Table -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="overflow-x-auto dark:bg-gray-800">
                        <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-800">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-white">
                                        Product
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-white">
                                        Category
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-white">
                                        Price
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-white">
                                        Stock
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-white">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-white">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($products as $product)
                                    <tr class="hover:bg-gray-500">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 flex-shrink-0">
                                                    @if($product->images->first())
                                                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                                                class="h-10 w-10 rounded-lg bg-gray-200"
                                                                alt="Product Image">                         
                                                    @endif
                                           </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{$product->name}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $colors = [
                                                    'bg-red-100 text-red-800',
                                                    'bg-green-100 text-green-800',
                                                    'bg-yellow-100 text-yellow-800',
                                                    'bg-blue-100 text-blue-800',
                                                    'bg-purple-100 text-purple-800',
                                                    'bg-pink-100 text-pink-800',
                                                    'bg-indigo-100 text-indigo-800',
                                                    'bg-orange-100 text-orange-800',

                                                ];
                                                $randomColor = $colors[array_rand($colors)];
                                            @endphp
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $randomColor }} ">
                                                {{$product->category->name}}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                            {{$product->price}} 
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                            {{$product->quantity}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{$product->status === "in_stock" ? "bg-green-100 text-green-800" : "bg-red-300 text-red-800"}} ">
                                                {{$product->status}}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{route('editProduct',$product->id)}}" class="text-primary-600 hover:text-primary-900">Edit</a>
                                                <a href="{{route('deleteProduct',$product->id)}}" class="text-red-600 hover:text-red-900">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    
                </div>
            </main>
        </div>
    </div>

@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            toggleAddProductModal(); 
        });
    </script>
@endif
@endsection

