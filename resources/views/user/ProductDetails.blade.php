@extends('includes.main')

@section('title')
    Product details
@endsection

@section('content')

@section('nav')
    @include('user.partials.nav')
@endsection

@section('user_product_details_js')
<script src="{{ asset('js/product_details_script.js') }}"></script>
@endsection

    <div class="max-w-5xl mx-auto my-40 bg-white rounded-2xl shadow-2xl flex flex-col md:flex-row gap-10 p-8 dark:bg-gray-800">
        <div class="flex-1 flex flex-col items-center">
            <div class="bg-gradient-to-tr from-blue-100 to-purple-100 p-2 rounded-2xl shadow-inner mb-4">
                <img id="mainImage" class="w-80 h-80 object-cover rounded-xl shadow-lg transition-all duration-300"
                 src="{{ asset('storage/' . $product->images->first()->image_path)}}" alt="Thumb 1">
            </div>
            <div class="flex gap-3">
                @foreach($product->images as $image)
                    <img class="thumbnail ring-2 ring-blue-500 scale-105 w-16 h-16 object-cover rounded-lg cursor-pointer transition-all duration-200 shadow hover:scale-110 hover:ring-4 hover:ring-blue-300" 
                    src="{{ asset('storage/' . $image->image_path)}}" alt="Thumb 1">
                @endforeach
            </div>
        </div>
        <div class="flex-1 flex flex-col justify-center">
            <div class="flex items-center mb-2">
                <span class="inline-block bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full mr-3">Best Seller</span>
                <div class="flex items-center text-yellow-400 text-lg">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.5 6,11.7 4.8,17.6 9.9,14.6 15,17.6 13.8,11.7 18.2,7.5 12.2,6.6 "/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.5 6,11.7 4.8,17.6 9.9,14.6 15,17.6 13.8,11.7 18.2,7.5 12.2,6.6 "/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.5 6,11.7 4.8,17.6 9.9,14.6 15,17.6 13.8,11.7 18.2,7.5 12.2,6.6 "/></svg>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.5 6,11.7 4.8,17.6 9.9,14.6 15,17.6 13.8,11.7 18.2,7.5 12.2,6.6 "/></svg>
                    <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20"><polygon points="9.9,1.1 7.6,6.6 1.6,7.5 6,11.7 4.8,17.6 9.9,14.6 15,17.6 13.8,11.7 18.2,7.5 12.2,6.6 "/></svg>
                    <span class="ml-2 text-gray-500 text-sm">4.0 (234 reviews)</span>
                </div>
            </div>
            <div class="text-3xl font-bold mb-3 text-gray-800 dark:text-white">{{$product->name}}</div>
            <div class="mb-5">
                <span class="inline-block bg-gradient-to-r from-blue-600 to-blue-400 text-white text-2xl font-bold px-6 py-2 rounded-lg shadow">${{$product->price}}</span>
            </div>
            <div class="text-base text-gray-600 mb-8 leading-relaxed dark:text-white">
                {!! nl2br(e($product->description)) !!}
            </div>
            <!-- Features Card -->
            
            <button class="group bg-gradient-to-r from-blue-600 to-blue-400 text-white rounded-lg px-8 py-4 text-lg font-bold shadow hover:from-blue-700 hover:to-blue-500 transition-all duration-200 w-full md:w-auto flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-blue-200">
                <svg class="w-6 h-6 mr-1 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A2 2 0 0 0 7.48 19h9.04a2 2 0 0 0 1.83-1.3L21 13M7 13V6a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v7"/></svg>
                Add to Cart
            </button>
        </div>
    </div>


@endsection