<?php

namespace Morenorafael\Alegra\Models;

use Illuminate\Support\Collection;
use Morenorafael\Alegra\Facades\Alegra;

/**
 * @property array $items
 * @property string $date
 * @property string $dueDate
 */
class Invoice extends Model
{
    protected string $uri = 'invoices';

    public function addClient(Contact|int $contact): static
    {
        if (gettype($contact) === 'integer') {
            $contact = (new Contact($this->request))->find($contact);;
        }

        $this->attributes['client'] = $contact->id;

        return $this;
    }

    public function addProduct(Product|int $product, int $quantity): static
    {
        if (gettype($product) === 'integer') {
            $product = (new Product($this->request))->find($product);;
        }

        $product = $product->toArray();
        $product['quantity'] = $quantity;

        $this->attributes['items'][] = $product;

        return $this;
    }

    public function addProducts(Collection $products): static
    {
        $products->each(function (Product $product) {
            $this->addProduct($product, $product->quantity);
        });

        return $this;
    }

    public function cancel(?int $id = null, ?string $cause = null, string $relateFolio = null): bool
    {
        $this->id = $id ?? $this->id;

        $data = [];

        if (!is_null($cause)) {
            $data['cause'] = $cause;
        }

        if (!is_null($relateFolio)) {
            $data['relateFolio'] = $relateFolio;
        }

        $result = $this->request->post("/{$this->uri}/{$this->id}/void", $data);

        return $result->successful();
    }
}
