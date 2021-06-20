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
        $this->registerErrorViewPaths();
        
        $statusCode = $this->isHttpException($e)
            ? $e->getStatusCode()
            : 500;

        $view = $request->ajax()
            ? "output.errors.{$statusCode}"
            : "errors.{$statusCode}";

        $data = [
            'exception' => $e,
            'input' => implode(' ', $request->segments()),
            'message' => config('app.debug') || $this->isHttpException($e)
                ? $e->getMessage()
                : 'Server Error',
        ];

        if ($request->wantsTurboStream()) {
            return turbo_stream($statusCode)->append('output', $view, $data);
        }

        return response()->view($view, $data, $statusCode);
    }

    protected function unauthenticated($request, AuthenticationException $e)
    {
        return redirect()->guest(route('login'));
    }
}
