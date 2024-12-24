@extends('layouts.web')

@section('content')
<div class="cart-page-container">
    <h1 class="cart-title">My Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(!empty($cart) && count($cart) > 0)
    <div class="cart-items">
        @php $cartTotal = 0; @endphp
        @foreach($cart as $id => $item)
            @php $itemTotal = $item['price'] * $item['quantity']; @endphp
            @php $cartTotal += $itemTotal; @endphp
            <div class="cart-item">
                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-image">
                <div class="cart-item-info">
                    <h2>{{ $item['name'] }}</h2>
                    <p>Price: Rs. {{ number_format($item['price'], 2) }}</p>
                    <form action="{{ route('cart.update', $id) }}" method="POST" class="quantity-form">
                        @csrf
                        @method('PUT')
                        <label for="quantity-{{ $id }}">Quantity:</label>
                        <input type="number" name="quantity" id="quantity-{{ $id }}" value="{{ $item['quantity'] }}" min="1">
                        <button type="submit" class="btn-purple ">Update</button>
                    </form>
                    <p>Total: Rs. {{ number_format($itemTotal, 2) }}</p>
                </div>
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove Item</button>
                </form>
            </div>
        @endforeach
    </div>
    <div class="cart-summary">
        <h3>Cart Total: Rs. {{ number_format($cartTotal, 2) }}</h3>
        <button class="btn btn-purple">Proceed to Checkout</button>
    </div>
    @else
    <div class="text-center py-4" style="font-size: 19px;">
        <b><p>Your cart is empty!</p></b>
    </div>
    @endif
</div>
@endsection
