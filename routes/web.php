<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MessageController;




Route::get('/', [WebController::class, 'home'])->name('home');


Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->is_admin) {
        return redirect()->route('admin.products.index');
    } else {
        return redirect()->route('home');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/products', [WebController::class, 'products'])->name('products');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
/*   Route::get('/cart', [WebController::class, 'cart'])->name('cart');   */
 
// Cart Routes
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart'); // Main cart page
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add'); // Add to cart route
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove'); // Remove from cart route
Route::patch('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});

Route::get('/category/writing-instruments', [WebController::class, 'writingInstruments'])->name('category.writing');
Route::get('/category/paper-products', [WebController::class, 'paperProducts'])->name('category.paper');
Route::get('/category/desk-needs', [WebController::class, 'deskNeeds'])->name('category.desk');

Route::get('/search', [ProductController::class, 'search'])->name('search');


Route::get('/products', [WebController::class, 'products'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::post('/contact/submit', [MessageController::class, 'store'])->name('contact.submit');
Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages');


require __DIR__.'/auth.php';
?>
