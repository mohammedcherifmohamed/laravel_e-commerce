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


    @if(session('success'))
    <x-alert type="success" >
        {{ session('success') }}
    </x-alert>
    @endif


    @if(session('error'))
    <x-alert type="error" >
        {{ session('error') }}
    </x-alert>
    @endif

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
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">{{$order->user->name}}</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">{{$order->user->email}}</div>
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
                                    <button type="button" 
                                        data-order-id="{{$order->id}}"
                                        data-customer-name="{{$order->user->name}}"
                                        data-order-status="{{$order->status}}"
                                        data-order-total="{{$order->total}}"
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3 edit-order-btn">
                                        Edit
                                    </button>
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

    <!-- Edit Order Modal -->
    <div id="editOrderModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" id="editModalOverlay"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                                Edit Order
                            </h3>
                            <form action="{{route("admin.orders.update")}}" method="POST" id="editOrderForm">
                                @csrf
                                <div class="mt-4 space-y-4">
                                    <div>
                                        <label for="edit_order_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Order ID</label>
                                        <input name="order_id" type="text" id="edit_order_id" readonly class="mt-1 block w-full h-10 px-3.5 rounded-md border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-black dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <label for="edit_customer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer</label>
                                        <input type="text" id="edit_customer_name" readonly class="mt-1 block w-full h-10 rounded-md border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                                    </div>

                                    <div>
                                        <label for="edit_order_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                        <select name="status" id="edit_order_status" class="mt-1 block w-full h-10 px-3.5 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                                            <option value="pending">Pending</option>
                                            <option value="processing">Processing</option>
                                            <option value="completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="edit_order_total" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Total Amount</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">$</span>
                                            </div>
                                            <input type="text" id="edit_order_total" readonly class="pl-7 block w-full h-10 px-3.5 rounded-md border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-black-500 dark:text-white-400 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" id="saveOrderBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Save Changes
                    </button>

                </form>
                    <button type="button" id="closeEditOrderModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
