@extends('layouts.web')

@section('content')
<div class="product-container"> <!-- Matching the create page styling -->
    <h1 class="page-title">Update Product</h1>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div class="form-group">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter product name" required>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" placeholder="Enter product description" required>{{ $product->description }}</textarea>
        </div>

        <!-- Price -->
        <div class="form-group">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="Enter product price" step="0.01" required>
        </div>

        <!-- Category -->
        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Product Image -->
        <div class="form-group">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
            @if ($product->image)
                <div class="image-preview">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image" class="current-image">
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <button type="submit" class="btn btn-purple">Update Product</button>
        </div>
    </form>
</div>
@endsection
