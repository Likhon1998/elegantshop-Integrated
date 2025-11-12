<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterSubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ], [
      
            'email.required' => 'Please enter your email address to subscribe.',
            'email.email' => 'The email address must be a valid format.',
            'email.unique' => 'This email is already subscribed to our newsletter. Thank you!',
        ]);
        Newsletter::create([
            'email' => $request->email,
            'status' => true, 
        ]);

        return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter! Check your inbox for updates.');
    }
}