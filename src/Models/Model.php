<?php

namespace Morenorafael\Alegra\Models;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;

/**
 * @property int $id
 */
abstract class Model extends Fluent
{
    protected string $uri;

    public function __construct(protected PendingRequest $request)
    {
        parent::__construct([]);
    }

    public function all(): Collection
    {
        $result = $this->request->get("/{$this->uri}")->json();

        return collect($result)->map(function (array $attributes) {
            return $this->setAttributes($attributes);
        });
    }

    public function find(int $id): static
    {
        $result = $this->request->get("/{$this->uri}/{$id}")->json();

        $this->attributes = $result;

        return $this;
    }

    public function create(): static
    {
        $this->attributes = $this->request->post("/{$this->uri}", $this->attributes)->json();

        return $this;
    }

    public function update(array $data): static
    {
        $this->attributes = $this->request->put("/{$this->uri}/{$this->id}", $data)->json();

        return $this;
    }

    public function delete(?int $id = null): bool
    {
        $this->id = $id ?? $this->id;

        $result = $this->request->delete("/{$this->uri}/{$this->id}");

        return $result->successful();
    }

    protected function setAttributes(array $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }
}
