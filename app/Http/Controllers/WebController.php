<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WebController extends Controller
{
    public function home()
    {
        return view('pages.home'); 
    }
   
    public function products()
    {
        $products = Product::all(); // Fetch all products
        return view('pages.products', compact('products'));
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
  
}  

