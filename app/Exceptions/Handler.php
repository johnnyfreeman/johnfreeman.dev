<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    protected function prepareResponse($request, Throwable $e)
    {
        $statusCode = $this->isHttpException($e)
            ? $e->getStatusCode()
            : 500;

        return response()->view(
            "output.errors.{$statusCode}",
            [
                'exception' => $e,
                'input' => implode(' ', $request->segments()),
                'message' => config('app.debug') || $this->isHttpException($e)
                    ? $e->getMessage()
                    : 'Server Error',
            ],
            $statusCode
        );
    }

    protected function unauthenticated($request, AuthenticationException $e)
    {
        return redirect()->guest(route('login'));
    }
}
