@extends('layouts.web')

@section('content')

<div class="edit-page">
        <div class="edit-container">
        <h1>Edit Product</h1>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <label for="name">Product Name:</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
            
            <label for="description">Description:</label>
            <textarea name="description" required>{{ $product->description }}</textarea>
            
            <label for="price">Price:</label>
            <input type="number" name="price" value="{{ $product->price }}" step="0.01" required>
            
            <label for="image">Product Image:</label>
            <input type="file" name="image">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
            @endif
            
            <button type="submit">Update Product</button>
        </form>
</div>
    </div>
@endsection
