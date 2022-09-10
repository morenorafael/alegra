<?php

namespace Morenorafael\Alegra\Models;

/**
 * @property string $name
 * @property float $percentage
 * @property string $description
 * @property string $type
 * @property string $status
 */
class Tax extends Model
{
    protected string $uri = 'taxes';

    /**
     * @throws \Exception
     */
    public function update(array $data): static
    {
        throw new \Exception('El metodo [update] no esta disponible para ['.self::class.']');
    }

    /**
     * @throws \Exception
     */
    public function delete(?int $id = null): bool
    {
        throw new \Exception('El metodo [delete] no esta disponible para ['.self::class.']');
    }
}
