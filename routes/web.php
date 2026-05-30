<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/layanan', [ServiceController::class, 'index'])->name('services.index');
Route::get('/pelatihan', [TrainingController::class, 'index'])->name('trainings.index');
Route::get('/pelatihan/{id}', [TrainingController::class, 'show'])->name('trainings.show');
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::post('/kontak', [PageController::class, 'submitContact'])->name('contact.submit');

// Auth Routes (Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authenticated Customer Routes
Route::middleware('auth')->group(function () {
    // My Transactions
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transaksi/{order_number}/bukti', [TransactionController::class, 'showReceipt'])->name('transactions.receipt');

    // Cart
    Route::resource('keranjang', CartController::class)->names([
        'index' => 'cart.index',
        'store' => 'cart.store',
        'update' => 'cart.update',
        'destroy' => 'cart.destroy',
    ])->only(['index', 'store', 'update', 'destroy']);
    
    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    
    // Payment
    Route::get('/pembayaran/{order_number}', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/pembayaran/{order_number}/upload', [PaymentController::class, 'upload'])->name('payment.upload');
    
    // Service Booking
    Route::post('/layanan', [ServiceController::class, 'store'])->name('services.store');
    
    // Training Registration
    Route::post('/pelatihan/{id}/daftar', [TrainingController::class, 'register'])->name('trainings.register');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('produk', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('kategori', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('pesanan', \App\Http\Controllers\Admin\OrderController::class);
    Route::post('/pesanan/{id}/verifikasi', [\App\Http\Controllers\Admin\OrderController::class, 'verify'])->name('pesanan.verify');
    Route::post('/pesanan/{id}/tolak', [\App\Http\Controllers\Admin\OrderController::class, 'reject'])->name('pesanan.reject');
    Route::resource('layanan', \App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('pelatihan', \App\Http\Controllers\Admin\TrainingAdminController::class);
    Route::get('/pelatihan/{id}/peserta', [\App\Http\Controllers\Admin\TrainingAdminController::class, 'registrations'])->name('pelatihan.registrations');
    Route::post('/pelatihan/peserta/{id}', [\App\Http\Controllers\Admin\TrainingAdminController::class, 'updateRegistration'])->name('pelatihan.updateRegistration');
    Route::resource('artikel', \App\Http\Controllers\Admin\ArticleController::class);
    Route::resource('testimoni', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('pengguna', \App\Http\Controllers\Admin\UserController::class);
});

require __DIR__.'/auth.php';
