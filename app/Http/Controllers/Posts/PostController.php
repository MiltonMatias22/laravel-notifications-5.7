<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // get all post with user
        $posts = Post::with(['user'])->paginate(10);

        return view('posts.index', compact('posts'));
    }
}
