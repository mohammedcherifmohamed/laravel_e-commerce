@extends('includes.main')

@section('title')
    Edit Category
@endsection



@section('content')

    <div id="addCategoryModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 ">
    <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4 border-b pb-2">
            <h2 class="text-2xl font-bold text-gray-800">Update Category</h2>
            <a href="{{route('Category')}}" id="closeModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</a>
        </div>
        <form action="{{ route('editPost') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                    <input value="{{$category->name}}" name="name" required type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring focus:ring-primary-300" placeholder="Enter category name">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea  name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring focus:ring-primary-300" placeholder="Enter category description">
                        {{$category->description}}
                    </textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                    <select value="{{$category->icon}}" name="icon" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring focus:ring-primary-300">
                        <option value="tv" {{ $category->icon == 'tv' ? 'selected' : '' }}>TV</option>
                        <option value="shirt" {{ $category->icon == 'shirt' ? 'selected' : '' }}>Shirt</option>
                        <option value="home" {{ $category->icon == 'home' ? 'selected' : '' }}>Home</option>
                        <option value="heart" {{ $category->icon == 'heart' ? 'selected' : '' }}>Beauty</option>
                        <option value="flag" {{ $category->icon == 'flag' ? 'selected' : '' }}>Sports</option>
                        <option value="book" {{ $category->icon == 'book' ? 'selected' : '' }}>Books</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="active" class="form-radio text-primary-600"  {{$category->status === "active" ? "checked" : "" }} >
                            <span class="ml-2 text-gray-700">Active</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="inactive" class="form-radio text-primary-600" {{$category->status === "inactive" ? "checked" : ""}} >
                            <span class="ml-2 text-gray-700">Inactive</span>
                        </label>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="px-5 py-2 bg-primary-600 text-white rounded-md font-semibold hover:bg-primary-700 transition-colors">
                        Update Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection