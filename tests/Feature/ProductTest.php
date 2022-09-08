<?php

namespace MorenoRafael\Alegra\Tests\Feature;

use Morenorafael\Alegra\Facades\Alegra;
use MorenoRafael\Alegra\Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_all_product()
    {
        $products = Alegra::product()->all();

        dd($products);
    }

    public function test_find_product()
    {
        $product = Alegra::product()->find(1);

        dd($product);
    }

    public function test_create_product()
    {
        $product = Alegra::product();
        $product->name = 'Tercer producto';
        $product->price = '1500';

        dd($product->create());
    }

    public function test_update_product()
    {
        $product = Alegra::product()->find(2);
        dd($product->update(['name' => 'Producto actualizado']));
    }

    public function test_delete_product()
    {
        $product = Alegra::product()->find(3);
        dd($product->delete());

        // dd(Alegra::product()->delete(3));
    }
}
