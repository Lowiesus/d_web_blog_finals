@extends('layouts.app')
@section('title', 'LifeCycle - Featured')
@section('content')

<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Featured Stories & Products</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($stories as $story)
                <a href="{{ route('stories.show', $story->story_id) }}" class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-xl transition-shadow block">
                    @if($story->image)
                        <img src="{{ asset('storage/' . $story->image) }}" alt="Story Image" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                    @endif
                    <div class="p-4">
                        <h2 class="text-lg font-semibold mb-2">{{ $story->title }}</h2>
                        <p class="text-gray-600 text-sm line-clamp-2">{{ Str::limit($story->content, 60) }}</p>
                        <div class="mt-2 text-xs text-gray-400">By {{ $story->user->name ?? 'Anonymous' }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

<!-- Add Your Story Modal -->
<div id="addStoryModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg relative">
        <button onclick="toggleStoryModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl">&times;</button>
        <h2 class="text-xl font-bold mb-4">Add Your Story</h2>
        <form method="POST" action="{{ route('stories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold mb-1" for="title">Title</label>
                <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1" for="content">Your Story</label>
                <textarea id="content" name="content" rows="5" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1" for="image">Upload Image (optional)</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800">
                Submit Story
            </button>
        </form>
    </div>
</div>

@auth
    <div class="fixed bottom-6 right-6">
        <button onclick="toggleStoryModal()" class="bg-black text-white px-6 py-3 rounded-full font-semibold hover:bg-gray-800 transition-all shadow-lg">
            + Add Your Story
        </button>
    </div>
@endauth

<script>
    function showStoryModal(storyId) {
    fetch(`/api/stories/${storyId}`)
            .then(response => {
                if (!response.ok) throw new Error('Story not found');
                return response.json();
            })
            .then(story => {
                let html = `
                    ${story.image ? `<img src="/storage/${story.image}" class="w-full h-64 object-cover rounded mb-4">` : ''}
                    <h2 class="text-2xl font-bold mb-2">${story.title}</h2>
                    <div class="text-gray-500 text-sm mb-4">By ${(story.user && story.user.name) ? story.user.name : 'Anonymous'} • ${story.created_at_formatted ?? ''}</div>
                    <p class="text-gray-800 whitespace-pre-line">${story.content}</p>
                `;
                document.getElementById('storyModalContent').innerHTML = html;
                document.getElementById('storyModal').classList.remove('hidden');
            })
            .catch(error => {
                document.getElementById('storyModalContent').innerHTML = '<p class="text-red-500">Failed to load story.</p>';
                document.getElementById('storyModal').classList.remove('hidden');
            });
    }
    function closeStoryModal() {
        document.getElementById('storyModal').classList.add('hidden');
    }
    function toggleStoryModal() {
        document.getElementById('addStoryModal').classList.toggle('hidden');
    }
    // Ensure modals are hidden on page load
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('storyModal').classList.add('hidden');
        document.getElementById('addStoryModal').classList.add('hidden');
    });
</script>
@endsection
