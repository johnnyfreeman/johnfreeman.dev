<?php

namespace App\Http\Controllers;

use App\Http\TerminalResponse;
use Illuminate\Http\Request;
use App\Post;

class BlogController
{
    public function __invoke(Request $request)
    {
        $posts = Post::with(['tags'])
            ->get([
                'title',
                'excerpt',
                'url',
                'published_at'
            ]);

        return (new TerminalResponse('blog'))
            ->with(compact('posts'));
    }
}
