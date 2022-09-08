<?php

namespace Morenorafael\Alegra;

use Illuminate\Http\Client\PendingRequest;
use Morenorafael\Alegra\Models\Contact;
use Morenorafael\Alegra\Models\Product;

class AlegraManager
{
    public function __construct(protected PendingRequest $request)
    {
    }

    public function product(): Product
    {
        return new Product($this->request);
    }

    public function contact(): Contact
    {
        return new Contact($this->request);
    }
}
