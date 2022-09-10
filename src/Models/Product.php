<?php

namespace Morenorafael\Alegra\Models;

use Illuminate\Support\Collection;

/**
 * @property string $name
 * @property string $description
 * @property \Morenorafael\Alegra\Models\Reference|string $reference
 * @property \Morenorafael\Alegra\Models\PriceList|float $price
 * @property \Morenorafael\Alegra\Models\Tax|float $tax
 * @property \Morenorafael\Alegra\Models\Category $category
 * @property \Morenorafael\Alegra\Models\Inventory $inventory
 * @property string $status
 * @property string $type
 * @property string $productKey
 */
class Product extends Model
{
    protected string $uri = 'items';

    public function addReference(Reference $reference): static
    {
        $this->attributes['reference'] = $reference->toArray();

        return $this;
    }

    public function addPrice(PriceList|float $price): static
    {
        if (gettype($price) === 'double') {
            $this->attributes['price'] = $price;
        } else {
            $this->attributes['price'] = $price->toArray();
        }

        return $this;
    }

    public function addPrices(Collection $prices): static
    {
        $prices->each(fn (PriceList $price) => $this->attributes['price'][] = $price->toArray());

        return $this;
    }

    public function addTax(Tax|float $tax): static
    {
        if (gettype($tax) === 'double') {
            $this->attributes['tax'] = $tax;
        } else {
            $this->attributes['tax'] = $tax->toArray();
        }

        return $this;
    }

    public function addTaxes(Collection $taxes): static
    {
        $taxes->each(fn (Tax $tax) => $this->attributes['tax'][] = $tax->toArray());

        return $this;
    }

    public function addCategory(Category $category): static
    {
        $this->attributes['category'] = $category->toArray();

        return $this;
    }

    public function addInventory(Inventory $inventory): static
    {
        $this->attributes['inventory'] = $inventory->toArray();

        return $this;
    }
}
