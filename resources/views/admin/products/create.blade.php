@extends('layouts.web')  <!-- Extends the admin layout -->

@section('content')
<div class="create-page">
    <div class="container-form">
        <h1>Create Product</h1>

        <!-- Product creation form -->
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf  <!-- CSRF protection -->

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter product description" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" placeholder="Enter product price" required>
            </div>

            <!-- Add category dropdown here -->
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- End category dropdown -->

            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" name="image" id="image" class="form-control-file" required>
            </div>

            <button type="submit" class=" btn-create">Create Product</button>
        </form>
    </div>
</div>
@endsection
