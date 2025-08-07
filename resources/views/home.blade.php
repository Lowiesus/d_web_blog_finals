@extends('layouts.app')

@section('title', 'LifeCycle - Home')

<script>
    function toggleStoryModal() {
        const modal = document.getElementById('storyModal');
        modal.classList.toggle('hidden');
    }
</script>

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gray-900 text-white">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Stories that move you.
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Discover the latest innovations, athlete journeys, and community stories that inspire greatness.
                </p>
                <a href="#featured" class="inline-block bg-white text-black px-8 py-3 rounded-full font-semibold hover:bg-gray-200 transition-colors">
                    Explore Stories
                </a>
            </div>
        </div>
        <!-- Hero Background Image -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/photo-1452573992436-6d508f200b30.avif') }}')"></div>
    </section>

    <!-- Story Section with Like Button -->
    <section class="max-w-5xl mx-auto px-4 py-12">
        @foreach($stories as $story)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-bold mb-2">{{ $story->title }}</h2>
                <p class="text-gray-700 mb-4">{{ $story->content }}</p>

                <form action="{{ route('stories.like', $story->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                        ❤️ Like ({{ $story->likes }})
                    </button>
                </form>
            </div>
        @endforeach
    </section>
@endsection


    <!-- Featured Section -->
    <section id="featured" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Stories</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    The latest stories from our community of athletes, innovators, and dreamers.
                </p>
            </div>

            <!-- Featured Story Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Main Featured Story -->
                <div class="lg:col-span-2">
                    <article class="relative overflow-hidden rounded-lg bg-white shadow-lg">
                        <img src="images/photo-1453169753818-2feab4b4246d.avif" 
                            alt="Featured Story"
                            class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-8 text-white">
                            <span class="inline-block bg-white/20 text-white px-3 py-1 rounded-full text-sm font-medium mb-3">
                                Innovation
                            </span>
                            <h3 class="text-2xl md:text-3xl font-bold mb-3">
                                The Future of Sustainable Athletic Wear
                            </h3>
                            <p class="text-gray-200 mb-4">
                                Discover how Nike is pioneering eco-friendly materials and manufacturing processes to create performance gear that doesn't compromise on quality or the environment.
                            </p>
                            <a href="#" class="inline-flex items-center text-white hover:text-gray-300">
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>

                
        

                <!-- Secondary Featured Stories -->
                <div class="space-y-6">
                    <article class="bg-white rounded-lg shadow-md overflow-hidden h-32">
                        <div class="flex h-full">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                alt="Story" 
                                class="w-32 h-full object-cover flex-shrink-0">
                            <div class="p-4 flex flex-col justify-center flex-1">
                                <div>
                                    <span class="inline-block bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-medium mb-1">
                                        Athletes
                                    </span>
                                    <h4 class="text-base font-semibold text-gray-900 mb-1 line-clamp-2">
                                        Rising Star: Local Athlete's Journey to Excellence
                                    </h4>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        Follow the inspiring story of determination and perseverance.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="bg-white rounded-lg shadow-md overflow-hidden h-32">
                        <div class="flex h-full">
                            <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                alt="Story"
                                class="w-32 h-full object-cover flex-shrink-0">
                            <div class="p-4 flex flex-col justify-center flex-1">
                                <div>
                                    <span class="inline-block bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-medium mb-1">
                                        Community
                                    </span>
                                    <h4 class="text-base font-semibold text-gray-900 mb-1 line-clamp-2">
                                        Building Courts, Building Dreams
                                    </h4>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        How community basketball courts are changing lives.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="space-y-6">
                    <article class="bg-white rounded-lg shadow-md overflow-hidden h-32">
                        <div class="flex h-full">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                alt="Story"
                                class="w-32 h-full object-cover flex-shrink-0">
                            <div class="p-4 flex flex-col justify-center flex-1">
                                <div>
                                    <span class="inline-block bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-medium mb-1">
                                        Technology
                                    </span>
                                    <h4 class="text-base font-semibold text-gray-900 mb-1 line-clamp-2">
                                        Smart Gear: The Science Behind Performance
                                    </h4>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        Exploring how data revolutionizes athletic performance.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="bg-white rounded-lg shadow-md overflow-hidden h-32">
                        <div class="flex h-full">
                            <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                alt="Story" 
                                class="w-32 h-full object-cover flex-shrink-0">
                            <div class="p-4 flex flex-col justify-center flex-1">
                                <div>
                                    <span class="inline-block bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-medium mb-1">
                                        Culture
                                    </span>
                                    <h4 class="text-base font-semibold text-gray-900 mb-1 line-clamp-2">
                                        Streetwear Meets Performance
                                    </h4>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        The intersection of street culture and innovation.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Stay Updated</h2>
            <p class="text-lg text-gray-600 mb-8">
                Get the latest stories and updates delivered to your inbox.
            </p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email"
                    placeholder="Enter your email"
                    class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent">
                <button type="submit"
                        class="bg-black text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-800 transition-colors">
                    Subscribe
                </button>
            </form>
        </div>
    </section>
    <!-- Story Modal -->

@endsection

