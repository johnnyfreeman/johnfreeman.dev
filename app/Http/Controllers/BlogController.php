<?php

namespace App\Http\Controllers;

use App\Services\Ghost;
use Illuminate\Http\Request;
use App\Http\TerminalResponse;

class BlogController
{
    public function __invoke(Request $request, Ghost $ghost)
    {
        $posts = $ghost->posts()
            ->with(['tags'])
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
