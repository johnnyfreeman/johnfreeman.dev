<?php

namespace App\Services\Ghost;

use App\Services\Ghost\Connector;
use Illuminate\Support\Collection;

class Posts
{
    public function __construct(
        public Connector $connector,
    ) {
    }

    public function with(array $include): static
    {
        $this->connector->withOptions([
            'query' => [
                'include' => implode(',', $include),
            ],
        ]);

        return $this;
    }

    public function select(array $fields): static
    {
        $this->connector->withOptions([
            'query' => [
                'fields' => implode(',', $fields),
            ],
        ]);

        return $this;
    }

    public function get(array $fields = []): Collection
    {
        if (!empty($fields)) {
            $this->select($fields);
        }

        return new Collection(
            $this->connector->get('content/posts')->json('posts')
        );
    }
}