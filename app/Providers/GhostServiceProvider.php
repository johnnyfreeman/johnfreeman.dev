<?php

namespace App\Providers;

use App\Services\Ghost;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class GhostServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(Ghost::class, function ($app) {
            return new Ghost(
                Http::baseUrl($app['config']->get('services.ghost.api_url') . '/ghost/api')
                    ->throw()
                    ->acceptJson()
                    ->withOptions([
                        'query' => [
                            'key' => $app['config']->get('services.ghost.content_api_key'),
                        ],
                    ])
            );
        });
    }
}
