@extends('layouts.app')
@section('title', $story->title)

@section('content')
<div class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="max-w-4xl mx-auto mb-6">
        <a href="{{ route('featured') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-800 bg-white px-4 py-2 rounded shadow hover:bg-gray-200 transition">
            <span>←</span> Back to Featured
        </a>
    </div>

    <!-- Story Card -->
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        @if($story->image)
            <img src="{{ asset('storage/' . $story->image) }}" alt="Story Image" class="w-full h-80 object-cover">
        @endif

        <div class="p-8">
            <!-- Author and Date -->
            <div class="flex items-center justify-between mb-6">
                <div class="text-sm text-gray-700">
                    By <span class="font-medium">{{ $story->user->name ?? 'Anonymous' }}</span>
                </div>
                <div class="text-sm text-gray-500">
                    {{ $story->created_at->format('F j, Y') }}
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-4xl font-extrabold text-gray-900 mb-6">{{ $story->title }}</h1>

            <!-- Content -->
            <div class="text-lg text-gray-800 whitespace-pre-line leading-relaxed mb-8">
                {{ $story->content }}
            </div>

            <!-- Like Button -->
            <form action="{{ route('stories.like', ['id' => $story->story_id]) }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg font-medium transition shadow">
                    ❤️ Like ({{ $story->likes }})
                </button>
            </form>
        </div>
    </div>
</div>
@endsection