@extends('includes.main')


@section('title')
    Edit Product Page
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     <!-- Add Product Modal -->
                            <div  class="fixed inset-0 z-50  overflow-y-auto bg-black bg-opacity-50">
                <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
                     

                        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Edit Product</h2>

                        <form action="{{ route('updateProduct',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Product Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                               @error('name')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                              @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Description</label>
                                    <textarea name="description" rows="4" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">{{$product->description}}</textarea>
                                 @error('description')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Category</label>
                                    <select value="" name="category_id" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$product->category_id == $category->id ? "selected" : ""}}  >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                 @error('category_id')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Price</label>
                                    <input type="number" step="0.01" value="{{$product->price}}" name="price" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                                 @error('price')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                              @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Stock Quantity</label>
                                    <input type="number" value="{{$product->quantity}}" name="quantity" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                                 @error('quantity')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                              @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Status</label>
                                    <select name="status" value="{{$product->status}}" class="w-full mt-1 px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary-500">
                                        <option value="in_stock" {{$product->status == "in_stock" ? "selected" : ""}} >In Stock</option>
                                        <option value="out_of_stock" {{$product->status == "out_of_stock" ? "selected" : ""}} >out Of Stock</option>
                                    </select>
                                 @error('status')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                   @enderror
                                </div>
                                <div class="flex flex-wrap gap-6">
                                    @foreach ($product->images as $image)
                                        <div class="flex flex-col items-center space-y-2">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                class="h-20 w-20 rounded-lg bg-gray-200 object-cover shadow"
                                                alt="Product Image">

                                            <form action="{{ route('deleteImage', $image->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
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
                                <a href="{{route('showProduct')}}"  class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300">
                                    Cancel
                                </a>
                                <button type="submit" class="bg-primary-600 text-white px-6 py-2 rounded-md hover:bg-primary-700">
                                    Upddate Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection