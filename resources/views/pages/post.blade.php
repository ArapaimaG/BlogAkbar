@extends('welcome')

@section('konten')

<main class="container mx-auto px-5 flex flex-grow">

    <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
        <!-- Judul Post -->
        <h1 class="text-4xl font-bold text-left text-gray-800">
            {{ $post->title }}
        </h1>
        <!-- Gambar Thumbnail -->
        <img class="w-full my-2 rounded-lg" src="{{ $post->imageUrl }}" alt="{{ $post->title }}">
        <!-- Metadata: Penulis, Waktu -->
        <div class="mt-2 flex justify-between items-center">
            <div class="flex py-5 text-base items-center">
                <img class="w-10 h-10 rounded-full mr-3"
                    src="https://ui-avatars.com/api/?name={{ urlencode($post->author->name) }}&background=black&color=FFFFFF"
                    alt="avatar">
                <span class="mr-1">{{ $post->author->name }}</span>
                <span class="text-gray-500 text-sm">| {{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>

        <!-- Isi Konten -->
        <div class="article-content py-3 text-gray-800 text-lg text-justify">
            {!! $post->body !!}
        </div>

        <!-- Tags -->
        <!-- Category -->
        <div class="flex items-center space-x-4 mt-10">
            <a href="{{ route('blog', ['category' => $post->category->slug]) }}"
                class="bg-blue-400 text-white rounded-xl px-3 py-1 text-base">
                {{ $post->category->name }}
            </a>
        </div>

    </article>
</main>

@endsection