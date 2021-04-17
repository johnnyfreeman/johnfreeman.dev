<?php

namespace App\Providers;

use App\Auth\Root;
use App\Auth\SuperUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('sudo', function ($app, array $config) {
            return new SuperUserProvider(new Root);
        });
    }
}
