@extends('includes.main')
@section('content')
<div class="container mt-5">
    <h2>Checkout track</h2>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <h4>Order Summary</h4>
        <ul class="list-group mb-3">
            @foreach($cart as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['name'] }} x {{ $item['quantity'] }}
                    <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </li>
            @endforeach
        </ul>
        <div class="mb-3">
            <strong>Total: ${{ number_format($total, 2) }}</strong>
        </div>
        <button type="submit" class="btn btn-primary">Place Order (Cash on Delivery)</button>
    </form>
</div>
@endsection 