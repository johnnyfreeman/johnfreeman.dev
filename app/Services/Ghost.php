<?php

namespace App\Services;

use App\Services\Ghost\Posts;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Traits\ForwardsCalls;

class Ghost
{
    use ForwardsCalls;

    public function __construct(
        public PendingRequest $request,
    ) {
    }

    public function posts(): Posts
    {
        return new Posts($this);
    }

    public function __call($method, $parameters)
    {
        return $this->forwardDecoratedCallTo($this->request, $method, $parameters);
    }
}