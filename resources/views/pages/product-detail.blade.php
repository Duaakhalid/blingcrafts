@extends('layouts.web')

@section('content')
<div class="product-detail-container">
    <div class="product-detail">
        <div class="product-image">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <p class="product-price">Price: Rs. {{ number_format($product->price, 2) }}</p>
            <p class="product-description">{{ $product->description }}</p>

          
                <p class="product-stock">In Stock: {{ $product->stock }}</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="image" value="{{ $product->image }}">

                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}">

                    <button type="submit" class="btn btn-purple">Add to Cart</button>
                </form>
          
           
        </div>
    </div>
</div>
@endsection
