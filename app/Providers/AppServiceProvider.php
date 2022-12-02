<?php

namespace App\Providers;

use App\Post;
use App\Services\Ghost\Posts;
use App\Services\Ghost\Connector;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Request::macro('intended', function ($default = '/') {
            $request = Request::instance();
            $intended = Request::create($request->session()->pull('url.intended', $default));
            // $intended->query->replace($request->query->all());
            // $intended->request->replace($request->request->all());
            // $intended->attributes->replace($request->attributes->all());
            // $intended->cookies->replace($request->cookies->all());
            // $intended->files->replace($request->files->all());
            // $intended->server->replace($request->server->all());
            $intended->headers->replace($request->headers->all());
            // $intended->content = $request->content;
            // $intended->request = $intended->getInputSource();
            return $intended;
        });
        

        $this->app->bind(Post::class, function ($app) {
            return new Posts(
                $app->make(Connector::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
