<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller   // ✅ Must extend Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function index()
    {
        $customer = Auth::guard('customer')->user();

        return view('customer.index', compact('customer'));
    }
}
