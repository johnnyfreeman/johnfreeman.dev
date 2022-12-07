<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\TerminalResponse;
use Illuminate\Support\Facades\Validator;

class BlogController
{
    public function index(Request $request)
    {
        $posts = Post::paginate(5, [
                'title',
                'excerpt',
                'url',
                'published_at'
            ]);

        return (new TerminalResponse('blog'))
            ->with(compact('posts'));
    }

    public function create(Request $request)
    {
        return (new TerminalResponse('blog.create'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only(['title', 'excerpt', 'url', 'published_at']), [
            'title' => 'required',
            'excerpt' => 'required',
            'url' => 'required',
            'published_at' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('blog.create')
                ->withErrors($validator)
                ->withInput();
        }
        
        Post::create($validator->validated());

        return redirect()->route('blog')
            ->with('success', 'Post created');
    }
}
