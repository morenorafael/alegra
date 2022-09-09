<?php

namespace Morenorafael\Alegra\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Morenorafael\Alegra\Models\Product product()
 * @method static \Morenorafael\Alegra\Models\Contact contact()
 * @method static \Morenorafael\Alegra\Models\Invoice invoice()
 */
class Alegra extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'alegra';
    }
}
