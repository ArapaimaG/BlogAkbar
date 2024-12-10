@extends('welcome')

@section('konten')

<div class="w-full text-center py-32">
    <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
        Selamat Datang di <span class="text-gray-900">Blog</span> <span class="text-red-500">&lt;AKB&gt;</span>
    </h1>
    <p class="text-gray-500 text-lg mt-1">Best Blog in the universe</p>
    <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
        href="{{ route('blog') }}">Start
        Reading</a>
</div>

<div class="mb-16">
    <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Recommendations</h2>
    <div class="w-full">
        <div class="grid grid-cols-3 gap-10 w-full">
            
        </div>
    </div>
    <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
        href="{{ route('blog') }}">More
        Posts</a>
</div>
<hr>

<div class="mb-10">
    <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Latest Posts</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($latest as $post)
        <div class="bg-white rounded-lg shadow p-4">
            <a href="{{ route('post.show', $post->slug) }}">
                <img class="w-full h-60 object-contain rounded-xl bg-gray-100"
                    src="{{ asset('storage/'.$post->thumbnail) }}">
            </a>
            <div class="mt-3">
                <div class="flex items-center mb-2">
                    <a href="{{ route('blog', ['category' => $post->category->slug]) }}"
                        class="bg-red-600 text-white rounded-xl px-3 py-1 text-sm mr-3">
                        {{ $post->category->name }}
                    </a>
                    <p class="text-gray-500 text-sm">{{ $post->created_at->format('Y-m-d') }}</p>
                </div>
                <a href="{{ route('post.show', $post->slug) }}" class="text-lg font-bold text-gray-900">{{ $post->title }}</a>
            </div>
        </div>
        @endforeach
    </div>

    <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold" href="{{ route('blog') }}">More Posts</a>
</div>

@endsection
