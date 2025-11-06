<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/homepage', [FrontendController::class, 'index'])->name('home');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/account/addresses', [FrontendController::class, 'accountAddresses'])->name('account.addresses');
Route::get('/account/dashboard', [FrontendController::class, 'accountDashboard'])->name('account.dashboard');
Route::get('/account/order/details', [FrontendController::class, 'accountOrderDetails'])->name('account.orders.details');
Route::get('/account/orders', [FrontendController::class, 'accountOrders'])->name('account.orders');
Route::get('/account/profile', [FrontendController::class, 'accountProfile'])->name('account.profile');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [FrontendController::class, 'blogSingle'])->name('blog.single');
Route::get('/campaign/{slug}', [FrontendController::class, 'campaignDetails'])->name('campaign.details');
Route::get('/campaigns', [FrontendController::class, 'campaigns'])->name('campaigns');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/category', [FrontendController::class, 'category'])->name('category');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/failed', [FrontendController::class, 'failed'])->name('failed');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/auth/forgot-password', [FrontendController::class, 'forgotPassword'])->name('forgot.password');
Route::get('/auth/login', [FrontendController::class, 'login'])->name('login');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-conditions', [FrontendController::class, 'termsAndConditions'])->name('terms.conditions');
Route::get('/product', [FrontendController::class, 'products'])->name('product');
Route::get('/auth/register', [FrontendController::class, 'register'])->name('register');
Route::get('/auth/reset-password', [FrontendController::class, 'resetPassword'])->name('reset.password');
Route::get('/auth/search-results', [FrontendController::class, 'searchResults'])->name('search.results');
Route::get('/success', [FrontendController::class, 'success'])->name('success');
Route::get('/auth/support/tickets', [FrontendController::class, 'supportTickets'])->name('support.tickets');
Route::get('/auth/support/ticket/{id}', [FrontendController::class, 'supportTicketView'])->name('support.ticket.view');
Route::get('/auth/vendors', [FrontendController::class, 'vendors'])->name('vendors');
Route::get('/auth/verify/email', [FrontendController::class, 'verifyEmail'])->name('verify.email');
Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');

/*
|--------------------------------------------------------------------------
| Customer Authentication (POST actions)
|--------------------------------------------------------------------------
*/
Route::post('/auth/register', [CustomerAuthController::class, 'register'])->name('customer.register.submit');
Route::post('/auth/login', [CustomerAuthController::class, 'login'])->name('customer.login.submit');


/*
|--------------------------------------------------------------------------
| Customer Dashboard (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:customer')->group(function () {
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
        ->name('customer.dashboard');
});







require __DIR__.'/auth.php';

