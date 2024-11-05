@extends('layouts.web')

@section('content')
    
        <div class="image d-flex justify-content-center align-items-center" style="height: 100vh;">    
            <div class="hero-content text-center bg-opacity-5 p-4 rounded">
                <h1><strong>Welcome to Bling Crafts</strong></h1>
                <p>Your one-stop shop for all things bling!</p>
                <a href="{{ route('products') }}" class="btn btn-purple" style="margin-left:3%;">Shop Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
