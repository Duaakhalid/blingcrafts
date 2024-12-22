<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get(); 
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
    
        // Save the uploaded image file
        $product->image = $request->file('image')->store('products', 'public');
    
        $product->category_id = $request->category_id; // Save the selected category
        $product->save();
    
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'price' => 'required|numeric|min:0',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'category_id' => 'required|exists:categories,id',
    //     ]);

    //     $product = Product::findOrFail($id);

    //     if ($request->hasFile('image')) {
    //         if ($product->image && Storage::exists('public/' . $product->image)) {
    //             Storage::delete('public/' . $product->image);
    //         }
    //         $imagePath = $request->file('image')->store('products', 'public');
    //     } else {
    //         $imagePath = $product->image;
    //     }

    //     $product->update([
    //         'name' => $validated['name'],
    //         'description' => $validated['description'],
    //         'price' => $validated['price'],
    //         'image' => $imagePath,
    //         'category_id' => $validated['category_id'],
    //     ]);

    //     return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    // }

    public function update(Request $request, Product $product)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Update the product's properties
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;

    if ($request->hasFile('image')) {
        $product->image = $request->file('image')->store('products', 'public');
    }

    $product->category_id = $request->category_id;

    // Save the updated product to the database
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
}


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
