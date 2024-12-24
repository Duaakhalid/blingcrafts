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

