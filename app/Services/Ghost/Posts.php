<?php

namespace App\Services\Ghost;

use App\Services\Ghost;
use Illuminate\Support\Collection;

class Posts
{
    public function __construct(
        public Ghost $ghost,
    ) {
    }

    public function with(array $include): static
    {
        $this->ghost->withOptions([
            'query' => [
                'include' => implode(',', $include),
            ],
        ]);

        return $this;
    }

    public function select(array $fields): static
    {
        $this->ghost->withOptions([
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
            $this->ghost->get('content/posts')->json('posts')
        );
    }
}