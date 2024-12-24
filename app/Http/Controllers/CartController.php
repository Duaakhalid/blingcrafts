<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []); // Retrieve cart data from session


        return view('pages.cart', compact('cart'));
    }

    
    public function addToCart(Request $request)
    {
       /*  $cart = session()->get('cart', []); // Get existing cart or initialize empty array
    
        // Add product to cart
        $cart[$request->id] = [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ];
    
        session()->put('cart', $cart); // Save cart to session
        return back()->with('success', 'Product added to cart!'); */

        
{
    $cart = session()->get('cart', []); // Get existing cart or initialize empty array

    $productId = $request->id;
    $quantity = $request->quantity;

    // Check if product is already in cart
    if (isset($cart[$productId])) {
        // If product is in the cart, just update the quantity
        $cart[$productId]['quantity'] += $quantity;
    } else {
        // Add new product to the cart
        $cart[$productId] = [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $quantity,
            'image' => $request->image,
        ];
    }

    session()->put('cart', $cart); // Save cart to session

    return back()->with('success', 'Product added to cart!');
}

    }



     public function showCart()
    {
        $cart = session()->get('cart', []);
        /* dd($cart); */ // Stop execution and display the cart contents
        return view('pages.cart', compact('cart'));
    } 


    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            unset($cart[$id]); // Remove item
            session()->put('cart', $cart); // Update session
        }
    
        return back()->with('success', 'Product removed from cart!');
    }

    public function updateQuantity(Request $request, $id)
{
    $cart = session()->get('cart', []);

    // Check if the item exists in the cart
    if (isset($cart[$id])) {
        // Update the quantity
        $cart[$id]['quantity'] = $request->input('quantity');
        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Cart updated successfully!');
    }

    return redirect()->route('cart.show')->with('error', 'Item not found in cart.');
}


public function updateCart(Request $request, $id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = max(1, $request->quantity); // Ensure quantity is at least 1
        session()->put('cart', $cart);
    }
    return redirect()->route('cart')->with('success', 'Cart updated successfully!');
}
 
}
