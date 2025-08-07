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
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('stories', 'public');
        }

        \Illuminate\Support\Facades\Auth::user()->stories()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $imagePath,
        ]);

        return redirect()->route('featured')->with('success', 'Story added successfully!');
    }

    public function index()
    {
        $stories = \App\Models\Story::latest()->get();
        return view('home', compact('stories'));
    }

    public function featured()
    {
        $stories = \App\Models\Story::with('user')->latest()->get();
        return view('featured', compact('stories'));
    }

    public function like($id)
{
    $story = Story::findOrFail($id);
    $story->likes += 1;
    $story->save();

    return redirect()->back()->with('success', 'You liked the story!');
}

    public function show($story_id)
    {
        $story = \App\Models\Story::with('user')->where('story_id', $story_id)->firstOrFail();
        return view('stories.show', compact('story'));
    }
}