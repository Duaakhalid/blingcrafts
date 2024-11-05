@extends('layouts.web') 
@section('content')
    <div class="cart-container">
        <h1 style="text-align:center;">My Cart</h1>
        
        @foreach ($products as $product)
            <div class="product">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                <div class="product-details">
                    <div class="product-name">{{ $product['name'] }}</div>
                    <div class="product-price">Price: {{ $product['price'] }}</div>
                    <div class="product-description">{{ $product['description'] }}</div>
                    
                    <!-- Quantity Input -->
                    <div class="product-quantity">
                        <label for="quantity-{{ $loop->index }}">Quantity:</label>
                        <input type="number" id="quantity-{{ $loop->index }}" name="quantity" value="1" min="1" class="quantity-input">
                    </div>
                    
                    <!-- Total Price (Static calculation as requested) -->
                    <div class="product-total">
                        <strong>Total:</strong> <span>{{ $product['price'] }}</span>
                    </div>
                    
                    <!-- Remove Button -->
                    <button class="remove-btn">Remove Item</button>
                </div>
            </div>
        @endforeach
        
        <!-- Static Cart Total and Checkout Button -->
        <div class="cart-summary">
            <div class="cart-total">
                <strong>Cart Total:</strong> <span>1965</span> <!-- Static total -->
            </div>
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>
    </div>
@endsection
