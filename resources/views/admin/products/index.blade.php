@extends('layouts.web')

@section('content')
    <div class="admin-products-page">
        <div class="admin-container">
            <h1>All Products</h1>
            <!-- New Messages Button -->
            <a href="{{ route('admin.messages') }}" class="btn-messages">View Messages</a>

            <a href="{{ route('admin.products.create') }}" class="btn-create">Create New Product</a>
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th> 
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-img">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>Rs.{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->category ? $product->category->name : 'No Category' }}</td> <!-- Display Category -->
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

