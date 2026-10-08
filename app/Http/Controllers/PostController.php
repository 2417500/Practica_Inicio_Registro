<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function myPosts()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->paginate(10);
        return view('posts.my_posts', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:nota,pensamiento,texto',
            'content' => 'required|string',
        ]);

        Auth::user()->posts()->create($request->all());

        return redirect()->route('posts.index')->with('success', 'Publicación creada con éxito.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();
        return back()->with('success', 'Publicación eliminada correctamente.');
    }
}