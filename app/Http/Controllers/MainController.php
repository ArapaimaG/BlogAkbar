<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $latest = Post::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.home', compact('latest'));
    }
    public function blog(Request $request)
    {
        $query = Post::where('status', 'published');

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->get('sort') === 'oldest') {
            $query->orderBy('created_at', 'asc'); // Urutkan berdasarkan tanggal terlama
        } else {
            $query->orderBy('created_at', 'desc'); // Default: urutkan berdasarkan tanggal terbaru
        }

        $posts = $query->paginate(10);
        $categories = Category::where('status', 'active')->get();

        return view('pages.blog', compact('posts', 'categories'));
    }
    public function show($slug)
    {
        $post = Post::with('category')->where('slug', $slug)->firstOrFail();
        $post->increment('views');
        return view('pages.post', compact('post'));

    }
}
