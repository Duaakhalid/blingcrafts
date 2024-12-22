<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class WebController extends Controller
{
    public function home()
    {
  
        return view('pages.home'); 
    }
    
    // public function writingInstruments()
    // {
    //     $products = Product::where('category_id', 1)->get(); // Replace '1' with the actual ID
    //     return view('category', compact('products'))->with('category', 'Writing Instruments');
    // }
    
    // public function paperProducts()
    // {
    //     $products = Product::where('category_id', 2)->get(); // Replace '2' with the actual ID
    //     return view('category', compact('products'))->with('category', 'Paper Products');
    // }
    
    // public function deskNeeds()
    // {
    //     $products = Product::where('category_id', 3)->get(); // Replace '3' with the actual ID
    //     return view('category', compact('products'))->with('category', 'Desk Needs');
    // }


    public function writingInstruments()
{
    $category = Category::where('name', 'Writing Instruments')->first();
    return view('category', ['products' => $category->products]);
}

public function paperProducts()
{
    $category = Category::where('name', 'Paper Products')->first();
    return view('category', ['products' => $category->products]);
}

public function deskNeeds()
{
    $category = Category::where('name', 'Desk Needs')->first();
    return view('category', ['products' => $category->products]);
}
    
    public function products()
    {
        $categories = Category::with('products')->get();
        return view('pages.products', compact('categories'));
    }

public function contact()
{
    return view('pages.contact'); 
}
public function cart()
{
    $products = [
        [
            'name' => 'Notebook',
            'price' => 'Rs.345',
            'description' => 'A5 ruled notebook',
            'image' => 'https://uk.collinsdebden.com/cdn/shop/files/A5SpiralNotesLyingDown-3.jpg?v=1701692506'
        ],
        [
            'name' => 'Ballpoint Pen',
            'price' => 'Rs.70',
            'description' => 'Set of ballpoint pen',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVOJDJhOsdBYjsA41svJf3wjwykDkkZxAleg&s'
        ],
        [
            'name' => 'Color Pencil',
            'price' => 'Rs.1550',
            'description' => 'Wooden color pencils',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGoNelRRRN7tmvLqtGd0AO22UskTGZMXmK-Q&s'
        ],
    ];
    return view('pages.cart', ['products' => $products]); 
    
}
public function index()
{
    $user = Auth::user();

    // Check if the user is an admin
    if ($user && $user->is_admin) {
        return redirect()->route('admin.products.index'); // Replace with your admin panel route
    }

    // Redirect regular users to the home page
    return redirect()->route('home');
 }
}  

