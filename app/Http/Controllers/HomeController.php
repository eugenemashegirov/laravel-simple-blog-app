<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::with('user')->orderByDesc('id')->paginate(3);

        return view('index', ['page' => 'main', 'posts' => $posts]);
    }
}
