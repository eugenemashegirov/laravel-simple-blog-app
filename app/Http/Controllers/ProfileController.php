<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ProfileController extends Controller
{
    public function index() {
        $posts = Post::where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(3);

        return view('index', ['page' => 'profile', 'posts' => $posts]);
    }
}
