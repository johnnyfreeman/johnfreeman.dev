<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\View\Meta;
use Illuminate\Http\Request;
use App\Http\TerminalResponse;
use Illuminate\Support\Facades\Validator;

class BlogController
{
    public function index(Request $request)
    {
        $posts = Post::latest('published_at')->paginate(5);

        return (new TerminalResponse('blog'))
            ->with(compact('posts'));
    }

    public function link(Request $request)
    {
        return (new TerminalResponse('blog.link'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only(['url']), [
            'url' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('blog.create')
                ->withErrors($validator)
                ->withInput();
        }

        $meta = new Meta($request->get('url'));
        
        Post::create([
            'site' => $meta->content('meta[property="og:site_name"]'),
            'title' => $meta->content('meta[property="og:title"]'),
            'excerpt' => $meta->content('meta[property="og:description"]'),
            'url' => $request->get('url'),
            'image' => $meta->content('meta[property="og:image"]'),
            'tags' => $meta->contents('meta[property="article:tag"]'),
            'published_at' => $meta->content('meta[property="article:published_time"]'),
        ]);

        return (new TerminalResponse('success'))->with([
            'input' => "blog link",
            'message' => 'Post linked.',
        ]);
    }

    public function edit(Request $request, Post $post)
    {
        return (new TerminalResponse('blog.edit'))
            ->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'site' => 'required',
            'title' => 'required',
            'excerpt' => 'required',
            'url' => 'required',
            'image' => 'required',
            'tags' => 'required',
            'published_at' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('blog.create')
                ->withErrors($validator)
                ->withInput();
        }
        
        $post->fill([
            ...$validator->validated(),
            'tags' => explode(',', $request->get('tags')),
        ])->save();

        return (new TerminalResponse('success'))->with([
            'input' => "blog {$post->id} update",
            'message' => 'Post updated.',
        ]);
    }

    public function unlink(Request $request, Post $post)
    {
        $post->delete();

        return (new TerminalResponse('success'))->with([
            'input' => "blog {$post->id} unlink",
            'message' => 'Post unlinked.',
        ]);
    }
}
