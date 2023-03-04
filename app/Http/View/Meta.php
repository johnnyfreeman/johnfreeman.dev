<?php

namespace App\Http\View;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class Meta
{
    private ?Crawler $crawler = null;

    public function __construct(string $url)
    {
        $this->crawler = new Crawler(Http::get($url)->body());
    }

    public function content($selector, $default = null): ?string
    {
        $crawler = $this->crawler->filter($selector);
        
        if ($crawler->count() === 0) {
            return $default;
        }

        return $crawler->attr('content');
    }

    public function contents($selector): array
    {
        return $this->crawler->filter($selector)->each(function (Crawler $node, $i) {
            return $node->attr('content');
        });
    }
}