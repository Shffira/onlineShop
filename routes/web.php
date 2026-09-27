<?php
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckoutMiddleware;
use App\Http\Controllers\Buyer\OrderController as BuyerOrderController;

Route::get('/', function () {

    $products = Product::with('category')
        ->where('is_active', true)
        ->where('is_slider', false)
        ->latest()
        ->take(8)
        ->get();

    $sliderProducts = Product::where('is_active', true)
        ->where('is_slider', true)
        ->orderBy('id')
        ->get();

    return view('home', compact('products', 'sliderProducts'));

})->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::view('/testimonials', 'testimonials.index')->name('testimonials');
Route::view('/contact', 'contact.index')->name('contact');
Route::post('/contact', fn () => back()->with('success', 'Pesan berhasil dikirim.'))->name('contact.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Checkout wajib melewati middleware. Guest akan mendapat alert lalu diarahkan ke login.
Route::middleware(CheckoutMiddleware::class)->group(function () {
    Route::get('/checkout/{product:slug}', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/{product:slug}', [OrderController::class, 'store'])->name('orders.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', AdminProductController::class)->except('show');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}', [AdminOrderController::class, 'update'])->name('orders.update');
});

// buyer
Route::middleware('auth')->prefix('buyer')->name('buyer.')->group(function () {

    Route::get('/orders', [BuyerOrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{order}', [BuyerOrderController::class, 'show'])
        ->name('orders.show');

});
