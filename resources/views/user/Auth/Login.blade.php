@extends('includes.main')


@section('title')
    
Login | Register

@endsection


@section('content')


    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="index.html" class="flex items-center">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <span class="ml-2 text-xl font-bold text-gray-900 dark:text-white">LuxeCart</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="darkModeToggle" class="p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <svg id="sunIcon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <svg id="moonIcon" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                    </button>
                    <a href="{{route('home')}}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Back to Home</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Logo -->
            <div class="text-center">
                <div class="flex justify-center">
                    <svg class="w-12 h-12 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-bold text-gray-900 dark:text-white">Welcome to LuxeCart</h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Sign in to your account or create a new one</p>
                
                @if(session("success"))
                    <div class="mt-4 text-green-600 dark:text-green-400">
                        {{ session("success") }}
                    </div>
                @endif
                @if(session("error"))
                    <div class="mt-4 text-green-600 dark:text-green-400">
                        {{ session("error") }}
                    </div>
                @endif


            </div>

            <!-- Tab Navigation -->
            <div class="flex rounded-lg bg-gray-100 dark:bg-gray-700 p-1">
                <button id="loginTab" class="flex-1 py-2 px-4 text-sm font-medium rounded-md bg-white dark:bg-gray-800 text-primary-600 dark:text-primary-400 shadow-sm">
                    Sign In
                </button>
                <button id="registerTab" class="flex-1 py-2 px-4 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                    Sign Up
                </button>
            </div>

            <!-- Login Form -->
            <div id="loginForm" class="space-y-6">
                <form class="space-y-6" action="{{route('UserloginPost')}}" method="POST">
                    @csrf
                    <div>
                        <label for="login-email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email address</label>
                        <input id="login-email" name="email" type="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                    </div>

                    <div>
                        <label for="login-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input id="login-password" name="password" type="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Remember me</label>
                        </div>

                        <div class="text-sm">
                            <a href="{{route('ForgetPasswordPage')}}" class="font-medium text-primary-600 dark:text-primary-400 hover:text-primary-500 dark:hover:text-primary-300">Forgot your password?</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                            Sign in
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-gray-50 dark:bg-gray-900 text-gray-500 dark:text-gray-400">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span class="ml-2">Google</span>
                        </button>

                        <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span class="ml-2">Facebook</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Register Form -->
            <div id="registerForm" class="space-y-6 hidden">
                <form class="space-y-6" action="{{route('registerPost')}}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label for="register-lastname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full name</label>
                            <input id="register-lastname" name="username" type="text" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                       
                            @error('username')
                                <span class="text-white font-bold" >{{$message}}</span>
                            @enderror
                            
                        </div>
                    </div>

                    <div>
                        <label for="register-email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email address</label>
                        <input id="register-email" name="email" type="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                    @error('email')
                                <span class="text-white font-bold" >{{$message}}</span>
                            @enderror
                    </div>

                    <div>
                        <label for="register-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input id="register-password" name="password" type="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                     @error('password')
                                <span class="text-white font-bold" >{{$message}}</span>
                            @enderror
                    </div>

                    <div>
                        <label for="register-confirm-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm password</label>
                        <input id="register-confirm-password" name="password_confirmation" type="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                     @error('password_confirmation')
                                <span class="text-white font-bold" >{{$message}}</span>
                            @enderror
                    </div>

                    <div class="flex items-center">
                        <input id="agree-terms" name="agree-terms" type="checkbox"  class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="agree-terms" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                            I agree to the <a href="#" class="text-primary-600 dark:text-primary-400 hover:text-primary-500 dark:hover:text-primary-300">Terms of Service</a> and <a href="#" class="text-primary-600 dark:text-primary-400 hover:text-primary-500 dark:hover:text-primary-300">Privacy Policy</a>
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                            Create account
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-gray-50 dark:bg-gray-900 text-gray-500 dark:text-gray-400">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span class="ml-2">Google</span>
                        </button>

                        <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span class="ml-2">Facebook</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg p-4 max-w-sm">
            <div class="flex items-center">
                <div id="toast-icon" class="flex-shrink-0">
                    <!-- Icon will be inserted by JavaScript -->
                </div>
                <div class="ml-3">
                    <p id="toast-message" class="text-sm font-medium text-gray-900 dark:text-white"></p>
                </div>
                <div class="ml-auto pl-3">
                    <button id="toast-close" class="inline-flex text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab switching
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        loginTab.addEventListener('click', () => {
            loginTab.classList.add('bg-white', 'dark:bg-gray-800', 'text-primary-600', 'dark:text-primary-400', 'shadow-sm');
            loginTab.classList.remove('text-gray-700', 'dark:text-gray-300', 'hover:text-gray-900', 'dark:hover:text-white');
            registerTab.classList.remove('bg-white', 'dark:bg-gray-800', 'text-primary-600', 'dark:text-primary-400', 'shadow-sm');
            registerTab.classList.add('text-gray-700', 'dark:text-gray-300', 'hover:text-gray-900', 'dark:hover:text-white');
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
        });

        registerTab.addEventListener('click', () => {
            registerTab.classList.add('bg-white', 'dark:bg-gray-800', 'text-primary-600', 'dark:text-primary-400', 'shadow-sm');
            registerTab.classList.remove('text-gray-700', 'dark:text-gray-300', 'hover:text-gray-900', 'dark:hover:text-white');
            loginTab.classList.remove('bg-white', 'dark:bg-gray-800', 'text-primary-600', 'dark:text-primary-400', 'shadow-sm');
            loginTab.classList.add('text-gray-700', 'dark:text-gray-300', 'hover:text-gray-900', 'dark:hover:text-white');
            registerForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
        });

        // Dark mode toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');

        // Check for saved theme preference or default to light mode
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        darkModeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        });

        // Form submission
        // const loginFormElement = loginForm.querySelector('form');
        // const registerFormElement = registerForm.querySelector('form');

        // loginFormElement.addEventListener('submit', (e) => {
        //     e.preventDefault();
        //     const email = document.getElementById('login-email').value;
        //     const password = document.getElementById('login-password').value;
            
        //     // Simple validation
        //     if (!email || !password) {
        //         showToast('Please fill in all fields', 'error');
        //         return;
        //     }

        //     // Mock login - in real app, this would be an API call
        //     showToast('Login successful! Redirecting...', 'success');
        //     setTimeout(() => {
        //         window.location.href = 'index.html';
        //     }, 1500);
        // });

        // registerFormElement.addEventListener('submit', (e) => {
        //     e.preventDefault();
        //     const firstname = document.getElementById('register-firstname').value;
        //     const lastname = document.getElementById('register-lastname').value;
        //     const email = document.getElementById('register-email').value;
        //     const password = document.getElementById('register-password').value;
        //     const confirmPassword = document.getElementById('register-confirm-password').value;
        //     const agreeTerms = document.getElementById('agree-terms').checked;
            
        //     // Simple validation
        //     if (!firstname || !lastname || !email || !password || !confirmPassword) {
        //         showToast('Please fill in all fields', 'error');
        //         return;
        //     }

        //     if (password !== confirmPassword) {
        //         showToast('Passwords do not match', 'error');
        //         return;
        //     }

        //     if (!agreeTerms) {
        //         showToast('Please agree to the terms and conditions', 'error');
        //         return;
        //     }

        //     // Mock registration - in real app, this would be an API call
        //     showToast('Account created successfully! Please sign in.', 'success');
        //     setTimeout(() => {
        //         loginTab.click();
        //     }, 1500);
        // });

        // // Toast notification system
        // function showToast(message, type = 'info') {
        //     const toast = document.getElementById('toast');
        //     const toastMessage = document.getElementById('toast-message');
        //     const toastIcon = document.getElementById('toast-icon');

        //     toastMessage.textContent = message;

        //     // Set icon based on type
        //     let iconHTML = '';
        //     let iconColor = '';

        //     switch (type) {
        //         case 'success':
        //             iconHTML = '<svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>';
        //             break;
        //         case 'error':
        //             iconHTML = '<svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>';
        //             break;
        //         default:
        //             iconHTML = '<svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>';
        //     }

        //     toastIcon.innerHTML = iconHTML;
        //     toast.classList.remove('hidden');

        //     // Auto hide after 5 seconds
        //     setTimeout(() => {
        //         toast.classList.add('hidden');
        //     }, 5000);
        // }

        // // Close toast
        // document.getElementById('toast-close').addEventListener('click', () => {
        //     document.getElementById('toast').classList.add('hidden');
        // });
    </script>

@endsection