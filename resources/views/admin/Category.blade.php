@extends('includes.main')

@section("title")
Category Page
@endsection

@section('nav')
    @include('admin.partials.nav')
@endsection


@section('content')


    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Categories Management</h1>
                <p class="text-gray-600 mt-2">Organize your products into categories</p>
            </div>
            <button class="bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                Add New Category
            </button>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Electronics Category -->
            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Electronics</h3>
                            <p class="text-sm text-gray-500">Latest gadgets and devices</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-primary-600 hover:text-primary-900 text-sm">Edit</button>
                        <button class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                    </div>
                </div>
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <span>24 products</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
            </div>

            <!-- Fashion Category -->
            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Fashion</h3>
                            <p class="text-sm text-gray-500">Trendy clothing and accessories</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-primary-600 hover:text-primary-900 text-sm">Edit</button>
                        <button class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                    </div>
                </div>
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <span>156 products</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
            </div>

            <!-- Home & Living Category -->
            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Home & Living</h3>
                            <p class="text-sm text-gray-500">Furniture and home decor</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-primary-600 hover:text-primary-900 text-sm">Edit</button>
                        <button class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                    </div>
                </div>
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <span>89 products</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
            </div>

            <!-- Beauty Category -->
            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Beauty</h3>
                            <p class="text-sm text-gray-500">Cosmetics and skincare</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-primary-600 hover:text-primary-900 text-sm">Edit</button>
                        <button class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                    </div>
                </div>
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <span>67 products</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
            </div>

            <!-- Sports Category -->
            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Sports</h3>
                            <p class="text-sm text-gray-500">Athletic gear and equipment</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-primary-600 hover:text-primary-900 text-sm">Edit</button>
                        <button class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                    </div>
                </div>
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <span>43 products</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
            </div>

            <!-- Books Category -->
            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Books</h3>
                            <p class="text-sm text-gray-500">Literature and educational</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-primary-600 hover:text-primary-900 text-sm">Edit</button>
                        <button class="text-red-600 hover:text-red-900 text-sm">Delete</button>
                    </div>
                </div>
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <span>234 products</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
            </div>
        </div>

        <!-- Add Category Form (Hidden by default) -->
        <div class="mt-8 bg-white rounded-lg shadow-sm p-6 hidden">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Add New Category</h3>
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="Enter category name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Icon Color</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <option>Blue</option>
                            <option>Purple</option>
                            <option>Green</option>
                            <option>Pink</option>
                            <option>Orange</option>
                            <option>Indigo</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="Enter category description"></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors">
                        Add Category
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection