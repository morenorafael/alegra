<?php

namespace Morenorafael\Alegra\Models;

class Invoice extends Model
{
    protected string $uri = 'invoices';

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

        $result = $this->request
            ->post("/{$this->uri}/{$this->id}/void", $data);

        return $result->successful();
    }
}
