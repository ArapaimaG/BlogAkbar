@extends('welcome')

@section('konten')
<div class="flex justify-between items-center border-b border-gray-100">
    <div id="filter-selector" class="flex items-center space-x-4 font-light">
        <a href="{{ route('blog', ['sort' => 'latest']) }}"
            class="py-4 {{ request('sort') === 'latest' || !request('sort') ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }}">
            Latest
        </a>
        <a href="{{ route('blog', ['sort' => 'oldest']) }}"
            class="py-4 {{ request('sort') === 'oldest' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }}">
            Oldest
        </a>
    </div>
</div>

<div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-4 gap-6">

    <!-- Main Content -->
    <div class="md:col-span-3 col-span-1">
        <h1 class="text-3xl font-bold mb-5">Blog Posts</h1>

        <!-- Filtered Category Info -->
        @if(request('category'))
        <p class="text-gray-700 mb-5">
            Showing posts in category:
            <span class="font-semibold">{{ $categories->where('slug', request('category'))->first()->name }}</span>
        </p>
        @endif

        <!-- Display Posts -->
        @if($posts->count())
        <div class="space-y-6">
            @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow p-4 flex flex-col md:flex-row items-start">
                <!-- Thumbnail -->
                <div class="md:w-1/3 w-full mb-4 md:mb-0">
                    <a href="{{ route('post.show', $post->slug) }}">
                        <img class="w-full h-48 object-cover rounded-xl bg-gray-100"
                            src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                    </a>
                </div>

                <!-- Content -->
                <div class="md:w-2/3 w-full md:pl-4">
                    <div class="flex items-center mb-2">
                        <a href="{{ route('blog', ['category' => $post->category->slug]) }}"
                            class="bg-red-600 text-white rounded-xl px-3 py-1 text-sm mr-3">
                            {{ $post->category->name }}
                        </a>
                        <p class="text-gray-500 text-sm">{{ $post->created_at->format('Y-m-d') }}</p>
                    </div>
                    <a href="{{ route('post.show', $post->slug) }}" class="text-lg font-bold text-gray-900 block mb-2">
                        {{ $post->title }}
                    </a>                    
                    <p class="text-gray-700 text-sm leading-relaxed">
                        {{ Str::limit(strip_tags($post->body), 150, '...') }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $posts->appends(request()->query())->links() }}
        </div>
        @else
        <p class="text-gray-500">No posts available.</p>
        @endif
    </div>


    <!-- Sidebar -->
    <div class="md:col-span-1 col-span-1 space-y-10">
        <!-- Search Box -->
        <div id="search-box">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Search</h3>
            <form action="{{ route('blog') }}" method="GET">
                <div class="w-full flex rounded-2xl bg-gray-100 py-2 px-3 items-center">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    <input
                        class="w-full ml-1 bg-transparent focus:outline-none text-xs text-gray-800 placeholder:text-gray-400"
                        type="text" name="search" placeholder="Search posts..." value="{{ request('search') }}">
                </div>
            </form>
        </div>

        <!-- Recommended Topics -->
        <div id="recommended-topics-box">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
            <div class="topics flex flex-wrap justify-start gap-2">
                @foreach($categories as $category)
                <a href="{{ route('blog', ['category' => $category->slug] + request()->except('category', 'page')) }}"
                    class="bg-blue-500 text-white rounded-xl px-3 py-1 text-sm">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection