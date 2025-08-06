<?php
use App\Models\Story;
use Illuminate\Support\Facades\Route;

Route::get('/stories/{story_id}', function($story_id) {
    $story = Story::with('user')->where('story_id', $story_id)->firstOrFail();
    $story->created_at_formatted = $story->created_at->format('M d, Y');
    return $story;
});