@extends('layouts.web')
@section('content')

    <div class="product-container">
        <h1 class="mb-3">Products</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-5">
                    <div class="card">
                   <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                    <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                            <p class="card-text"><strong>{{ $product['price'] }}</strong></p>
                            <a href="#" class="btn btn-purple">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection