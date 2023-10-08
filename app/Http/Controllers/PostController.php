<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function store(PostRequest $request) {
        $validatedData = $request->validated();

        Post::create([
            'user_id' => auth()->id(),
            'title' => $validatedData['title'],
            'text' => $validatedData['text']
        ]);

        return response()->json(['success' => true], 201);
    }

    public function show(string $id) {
        $post = Post::with('user')->findOrFail($id);

        return view('posts.show', compact('post'));
    }

    public function update(PostRequest $request, string $id) {
        $validatedData = $request->validated();
        $post = Post::whereBelongsTo(auth()->user())->findOrFail($id);

        if (($post->title === $validatedData['title']) && ($post->text === $validatedData['text'])) {
            return response()->json(['info' => 'Nothing to update'], 201);
        }

        if ($post->title !== $validatedData['title']) {
            $post->title = $validatedData['title'];
        }

        if ($post->text !== $validatedData['text']) {
            $post->text = $validatedData['text'];
        }

        $post->save();

        return response()->json(['success' => true], 201);
    }

    public function destroy(string $id) {
        Post::whereBelongsTo(auth()->user())->findOrFail($id)->delete();

        return response()->json(['success' => true], 201);
    }
}
