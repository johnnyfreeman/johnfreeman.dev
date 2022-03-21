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

    protected function renderExceptionResponse($request, Throwable $e)
    {
        try {
            return $request->wantsTurboStream()
                ? $this->convertExceptionToTurboStream($request, $e)
                : parent::renderExceptionResponse($request, $e);
        } catch (Throwable $e) {
            return parent::renderExceptionResponse($request, $e);
        }
    }

    protected function convertExceptionToTurboStream($request, Throwable $e)
    {
        $this->registerErrorViewPaths();

        $statusCode = $this->isHttpException($e)
            ? $e->getStatusCode()
            : 500;

        return turbo_stream($statusCode)
            ->append('output', view("output.errors.{$statusCode}", [
                'exception' => $e,
                'input' => implode(' ', $request->segments()),
                'message' => config('app.debug') || $this->isHttpException($e)
                    ? $e->getMessage()
                    : 'Server Error',
            ]));
    }

    protected function unauthenticated($request, AuthenticationException $e)
    {
        return redirect()->guest(route('login'));
    }
}
