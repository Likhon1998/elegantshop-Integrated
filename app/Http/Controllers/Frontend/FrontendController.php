<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // (we’ll create later)

class FrontendController extends Controller
{
    // ------------------------------
    // Homepage
    // ------------------------------
    public function index()
    {
        // Fetch featured products (will work after DB setup)
       $featuredProducts = [];

    return view('frontend.index', compact('featuredProducts'));
    }

    public function shop()
    {
        // Fetch featured products (will work after DB setup)
       $featuredProducts = [];

    return view('frontend.shop', compact('featuredProducts'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function accountAddresses()
    {
        return view('frontend.account-addresses');
    }

    public function accountDashboard()
    {
        return view('frontend.account-dashboard');
    }

    public function accountOrderDetails()
    {
        return view('frontend.account-order-details');
    }

    public function accountOrders()
    {
        return view('frontend.account-orders');
    }

    public function accountProfile()
    {
        return view('frontend.account-profile');
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function blogSingle()
    {
        return view('frontend.blog-single');
    }

    public function campaignDetails($slug)
    {
        return view('frontend.campaign-details');
    }

    public function campaigns()
    {
        return view('frontend.campaigns');
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function category()
    {
        return view('frontend.category');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function failed()
    {
        return view('frontend.failed');
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function forgotPassword()
    {
        return view('frontend.forgot-password');
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }
    public function termsAndConditions()
    {
        return view('frontend.terms-conditions');
    }

    public function products()
    {
        return view('frontend.product');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function resetPassword()
    {
        return view('frontend.reset-password');
    }

    public function searchResults()
    {
        return view('frontend.search-results');
    }   

    public function success()
    {
        return view('frontend.success');
    }

    public function supportTickets()
    {
        return view('frontend.support-tickets');
    }

    public function supportTicketView()
    {
        return view('frontend.support-ticket-view');
    }

    public function vendors()
    {
        return view('frontend.vendors');
    }

    public function VerifyEmail()
    {
        return view('frontend.verify-email');
    }   

    public function wishlist()
    {
        return view('frontend.wishlist');
    }
}
