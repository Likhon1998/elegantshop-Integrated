<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(10);
        return view('admin.newsletters.index', compact('newsletters'));
    }

    public function create()
    {
        return view('admin.newsletters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
            'status' => 'boolean',
        ]);

        Newsletter::create($request->only(['email', 'status']));

        return redirect()->route('admin.newsletters.index')->with('success', 'Subscriber added successfully.');
    }

    public function edit($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        return view('admin.newsletters.edit', compact('newsletter'));
    }

    public function update(Request $request, $id)
    {
        $newsletter = Newsletter::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:newsletters,email,' . $newsletter->id,
            'status' => 'boolean',
        ]);

        $newsletter->update($request->only(['email', 'status']));

        return redirect()->route('admin.newsletters.index')->with('success', 'Subscriber updated successfully.');
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();

        return redirect()->route('admin.newsletters.index')->with('success', 'Subscriber deleted successfully.');
    }
}
