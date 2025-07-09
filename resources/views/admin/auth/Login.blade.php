@extends('includes.main')

@section('title')
Login Page
@endsection


@section('content')
 <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="flex justify-center">
                    <div class="flex items-center">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">LuxeCart</h1>
                        <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">Admin</span>
                    </div>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900 dark:text-white">
                    Sign in to your account
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Access your admin dashboard
                </p>
            </div>

            <!-- Theme Toggle -->
            <div class="flex justify-center">
                <button id="darkModeToggle" class="p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <svg id="sunIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg id="moonIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
            </div>


            <!-- Login Form -->
            <form  action="{{route('adminloginPost')}}" method="POST" class="mt-8 space-y-6" id="loginForm">
               @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="relative">
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" value="{{old('email')}}" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 focus:z-10 sm:text-sm" placeholder="Email address">
                       @if(session('user_error'))
                        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                                {{ session('user_error') }}
                            </div>
                        @endif
                    </div>
                    <div class="relative">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-b-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 focus:z-10 sm:text-sm" placeholder="Password">
                        @if(session('password_error'))
                        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                                {{ session('password_error') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 dark:border-gray-600 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900 dark:text-white">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-primary-600 hover:text-primary-500 dark:text-primary-400 dark:hover:text-primary-300">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-primary-500 group-hover:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        Sign in
                    </button>
                </div>
               
            </form>

            <!-- Demo Credentials -->
            <div class="mt-8 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                <h3 class="text-sm font-medium text-blue-900 dark:text-blue-100 mb-2">Demo Credentials:</h3>
                <p class="text-xs text-blue-800 dark:text-blue-200">Email: admin@yurei.it</p>
                <p class="text-xs text-blue-800 dark:text-blue-200">Password: yurei123</p>
            </div>
            <div class="mt-3 text-center">
                <a href="{{ route('admin.register.form') }}">Don't have an account? Register</a>
            </div>
        </div>
    </div>

@endsection