@extends('includes.main')

@section("title")
Orders Management
@endsection

@section('nav')
    @include('admin.partials.nav')
@endsection

@section('admin_js')
<script src="{{ asset('js/admin_script.js') }}"></script>
@endsection

@section('content')

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Orders Management</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Manage and track customer orders</p>
            </div>
            <div class="flex gap-3">
                 <div class="relative">
                    <input type="text" placeholder="Search orders..." class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:text-white">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                <button class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filter
                </button>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden border border-gray-200 dark:border-gray-700">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Order ID</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <!-- Orders -->
                        @foreach($orders as $order)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <span class="font-medium text-primary-600 dark:text-primary-400">#ORD-{{$order->id}}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400 font-bold text-xs mr-3">
                                            {{ strtoupper(substr($order->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{$order->name}}</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">{{$order->email}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-white">{{$order->created_at->format('M d, Y')}}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">{{$order->created_at->format('h:i A')}}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="status-badge inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100
                                     {{$order->status == "pending" ? " text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400" : 
                                     ($order->status == "completed" ? " bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400" : 
                                     ($order->status == "cancelled" ? " bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400" : 
                                     ($order->status == "processing" ? " bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400" : "")))
                                        
                                        }} ">
                                        {{$order->status}}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-medium text-gray-900 dark:text-white">${{$order->total}}</span>
                                </td>
                                <td class="px-6 py-4 text-right text-sm font-medium">
                                    <button class="text-primary-600 hover:text-primary-900 dark:text-primary-400 dark:hover:text-primary-300 mr-3">View</button>
                                    <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
      
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->

            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/30 flex items-center justify-between">
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Showing <span class="font-medium text-gray-900 dark:text-white">{{$orders->firstItem()}}</span> to <span class="font-medium text-gray-900 dark:text-white">{{$orders->lastItem()}}</span> of <span class="font-medium text-gray-900 dark:text-white">{{$orders->total()}}</span> results
                </div>
                <div class="flex space-x-2">
                   <a
                        href="{{ $orders->previousPageUrl() }}"
                        class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded-md text-sm
                            {{ $orders->onFirstPage() ? 'opacity-50 pointer-events-none' : 'hover:bg-white dark:hover:bg-gray-600' }}">
                        Previous
                    </a>

                    <a
                        href="{{ $orders->nextPageUrl() }}"
                        class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded-md text-sm
                            {{ $orders->hasMorePages() ? 'hover:bg-white dark:hover:bg-gray-600' : 'opacity-50 pointer-events-none' }}">
                        Next
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
