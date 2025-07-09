@extends('includes.main')
@section('content')
<div class="container mt-5">
    <h2>Order Confirmation</h2>
    <div class="alert alert-success">Thank you for your order!</div>
    <h4>Order #{{ $order->id }}</h4>
    <p><strong>Shipping Address:</strong> {{ $order->address }}</p>
    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
    <h5>Items:</h5>
    <ul class="list-group mb-3">
        @foreach($order->items as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item->product->name ?? 'Product' }} x {{ $item->quantity }}
                <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
            </li>
        @endforeach
    </ul>
</div>
@endsection 