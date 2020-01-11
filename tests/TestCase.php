<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function ajaxGet($uri, array $headers = [])
    {
        return $this->get(
            $uri,
            array_merge(['HTTP_X-Requested-With' => 'XMLHttpRequest'], $headers)
        );
    }
}
