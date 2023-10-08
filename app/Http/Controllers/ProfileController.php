<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ProfileController extends Controller
{
    public function index() {
        $posts = Post::with('user')->whereBelongsTo(auth()->user())->orderByDesc('id')->paginate(3);

        return view('profile.index', compact('posts'));
    }
}
