@extends('layouts.web')

@section('content')

<div class= "card-page">
    <h1 class="mb-3">Our Products</h1>
    
    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        <div class="row">
            @foreach ($category->products as $product)
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Rs. {{ number_format($product->price, 2) }}</strong></p>
                          
                            <!-- <a href="#" class="btn btn-purple">Add to Cart</a> -->
                            <form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <input type="hidden" name="name" value="{{ $product->name }}">
    <input type="hidden" name="price" value="{{ $product->price }}">
    <input type="hidden" name="image" value="{{ $product->image }}">
    <input type="hidden" name="quantity" value="1"> <!-- Default quantity -->
    <button type="submit" class="btn btn-purple">Add to Cart</button>
</form>
<!-- View Product Button -->
<a href="{{ route('product.show', $product->id) }}" class="btn btn-info my--0  ml-2">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

</div>
</div>
@endsection
