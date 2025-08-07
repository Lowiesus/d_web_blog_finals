@extends('layouts.app')
@section('title', 'LifeCycle - Featured')
@section('content')

<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-12 text-center text-gray-800">🌟 Featured Stories & Products</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($stories as $story)
                <div class="bg-white rounded-xl shadow hover:shadow-xl transition duration-300 flex flex-col overflow-hidden">
                    <a href="{{ route('stories.show', $story->story_id) }}">
                        @if($story->image)
                            <img src="{{ asset('storage/' . $story->image) }}" alt="Story Image" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                    </a>
                    <div class="p-4 flex flex-col justify-between flex-grow">
                        <div>
                            <h2 class="text-lg font-semibold mb-1 text-gray-800">{{ $story->title }}</h2>
                            <p class="text-gray-600 text-sm mb-2 line-clamp-2">{{ Str::limit($story->content, 100) }}</p>
                        </div>
                        <div class="mt-2 text-xs text-gray-500">By {{ $story->user->name ?? 'Anonymous' }}</div>
                        <form action="{{ route('stories.like', ['id' => $story->story_id]) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white w-full py-2 rounded-lg font-medium transition">
                                ❤️({{ $story->likes }})
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Add Your Story Modal -->
<div id="addStoryModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg relative">
        <button onclick="toggleStoryModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl">&times;</button>
        <h2 class="text-2xl font-bold mb-4">📝 Share Your Story</h2>
        <form method="POST" action="{{ route('stories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block font-semibold mb-1">Title</label>
                <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block font-semibold mb-1">Your Story</label>
                <textarea id="content" name="content" rows="5" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block font-semibold mb-1">Upload Image (optional)</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 w-full font-medium">
                Submit Story
            </button>
        </form>
    </div>
</div>

@auth
    <div class="fixed bottom-6 right-6 z-40">
        <button onclick="toggleStoryModal()" class="bg-black text-white px-6 py-3 rounded-full font-semibold hover:bg-gray-800 transition-all shadow-lg">
            + Add Your Story
        </button>
    </div>
@endauth

<script>
    function toggleStoryModal() {
        document.getElementById('addStoryModal').classList.toggle('hidden');
    }
</script>

@endsection
