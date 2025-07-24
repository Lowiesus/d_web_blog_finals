<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048', // Optional image upload
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('stories', 'public'); // stores in storage/app/public/stories
    }

    auth()->user()->stories()->create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'image' => $imagePath,
    ]);

    return redirect()->back()->with('success', 'Story added successfully!');
}
public function index()
{
    $stories = \App\Models\Story::latest()->get();
    return view('home', compact('stories'));
}
}