@extends('layouts.web')

@section('content')
<div class="container-fluid">
    <div class="hero">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">    
            <div class="hero-content text-center bg-opacity-5 p-4 rounded">
                <h1><strong>Welcome to Bling Crafts</strong></h1>
                <p>Your one-stop shop for all things bling!</p>
                <a href="{{ route('products') }}" class="btn btn-purple">Shop Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
