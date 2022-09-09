<?php

namespace MorenoRafael\Alegra\Tests\Feature;

use Morenorafael\Alegra\Facades\Alegra;
use MorenoRafael\Alegra\Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_create_product()
    {
        $product = Alegra::product();
        $product->name = 'Producto Prueba';
        $product->price = '1500';

        $created = $product->create();

        $this->assertEquals('Producto Prueba', $created->name);
    }

    public function test_all_products()
    {
        $products = Alegra::product()->all();

        $this->assertEquals(1, $products->first()->id);
    }

    public function test_find_product()
    {
        $product = Alegra::product()->find(1);

        $this->assertEquals('Producto Prueba', $product->name);
    }

    public function test_update_product()
    {
        $product = Alegra::product()->find(1);

        $updated = $product->update(['name' => 'Producto actualizado']);

        $this->assertEquals('Producto actualizado', $updated->name);
    }

    public function test_delete_product()
    {
        $product = Alegra::product()->find(1);

        $deleted = $product->delete();

        $this->assertTrue($deleted);
    }
}
