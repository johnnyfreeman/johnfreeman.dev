<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePost extends FormRequest
{
    public function rules()
    {
        return [
            'url' => 'required',
        ];
    }

    public function save(Post $post)
    {
        $response = Http::get($this->get('url'));

        $crawler = new Crawler($html);

        $post->fill([
            'title' => $crawler->filter('meta[property="og:title"]')->attr('content'),
            'excerpt' => $crawler->filter('meta[property="og:description"]')->attr('content'),
            'site' => $crawler->filter('meta[property="og:site_name"]')->attr('content'),
            'image' => $crawler->filter('meta[property="og:image"]')->attr('content'),
            'tags' => json_encode($crawler->filter('meta[property="article:tag"]')->each(function (Crawler $node, $i) {
                return $node->attr('content');
            })),
            'published_at' => $crawler->filter('meta[property="article:published_time"]')->attr('content'),
        ])
    }
}
