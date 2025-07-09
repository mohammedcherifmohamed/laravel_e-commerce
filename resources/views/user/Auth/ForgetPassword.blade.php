@extends('includes.main')

@section('title', 'Forgot Password')

@section('content')
<main class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Forgot Your Password?</h2>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{route('sendVerifucationCode')}}">
            @csrf

            <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1 ">Email Address</label>
                
                <input type="email" name="email" id="email" required autofocus
                    class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-blue-200 
                    @error('email') border-red-500 @enderror">

                
                @if (session('error'))
                    <p class="text-red-500 text-sm mt-1">{{ session('error') }}</p>
                @endif
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Send Password Reset Link
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Back to login</a>
        </div>
    </div>
</main>
@endsection
