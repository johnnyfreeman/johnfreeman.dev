<?php

namespace App\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Cache\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\Kernel;
use Illuminate\Validation\ValidationException;

trait AuthenticatesRequests
{
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return app(Kernel::class)->handle($request->intended('intro'));
    }

    protected function sendLockoutResponse(Request $request)
    {
        event(new Lockout($request));

        $seconds = app(RateLimiter::class)->availableIn($request->ip());

        throw ValidationException::withMessages([
            'password' => [trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ])],
        ])->status(Response::HTTP_TOO_MANY_REQUESTS)->redirectTo(route('login'));
    }
    
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'password' => [trans('auth.failed')],
        ])->redirectTo(route('login'));
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return app(RateLimiter::class)->tooManyAttempts($request->ip(), 3);
    }

    protected function incrementLoginAttempts(Request $request)
    {
        return app(RateLimiter::class)->hit($request->ip(), 60);
    }

    protected function clearLoginAttempts(Request $request)
    {
        return app(RateLimiter::class)->clear($request->ip());
    }
}
