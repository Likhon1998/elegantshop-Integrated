<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\CartItemController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Frontend\NewsletterSubscriptionController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\Admin\SliderController;


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
Route::get('/customer/forgot-password', [FrontendController::class, 'forgotPassword'])->name('forgot.password');
Route::get('/customer/login', [FrontendController::class, 'login'])->name('customer.login');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-conditions', [FrontendController::class, 'termsAndConditions'])->name('terms.conditions');
Route::get('/product', [FrontendController::class, 'products'])->name('product');
Route::get('/customer/register', [FrontendController::class, 'register'])->name('customer.register');
Route::get('/customer/reset-password', [FrontendController::class, 'resetPassword'])->name('reset.password');
Route::get('/customer/search-results', [FrontendController::class, 'searchResults'])->name('search.results');
Route::get('/success', [FrontendController::class, 'success'])->name('success');
Route::get('/customer/support/tickets', [FrontendController::class, 'supportTickets'])->name('support.tickets');
Route::get('/customer/support/ticket/{id}', [FrontendController::class, 'supportTicketView'])->name('support.ticket.view');
Route::get('/customer/vendors', [FrontendController::class, 'vendors'])->name('vendors');
Route::get('/customer/verify/email', [FrontendController::class, 'verifyEmail'])->name('verify.email');
Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');

/*
|--------------------------------------------------------------------------
| Customer Authentication (POST actions)
|--------------------------------------------------------------------------
*/
Route::post('/customer/register', [CustomerAuthController::class, 'register'])->name('customer.register.submit');
Route::post('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login.submit');


/*
|--------------------------------------------------------------------------
| Customer Dashboard (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:customer')->group(function () {
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])
        ->name('customer.dashboard');
    Route::get('/customer/shop', [ShopController::class, 'index'])
        ->name('customer.shop');
    
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('sliders', SliderController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product_images', ProductImageController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('wishlists', WishlistController::class);
    Route::resource('cart_items', CartItemController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('newsletters', NewsletterController::class);
    Route::resource('brands', BrandController::class);



});
Route::post('/newsletter/subscribe', [NewsletterSubscriptionController::class, 'subscribe'])->name('newsletter.subscribe');






require __DIR__.'/auth.php';

