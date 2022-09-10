<?php

namespace MorenoRafael\Alegra\Tests\Feature;

use Morenorafael\Alegra\Facades\Alegra;
use MorenoRafael\Alegra\Tests\TestCase;

class InvoiceTest extends TestCase
{
    public function test_create_invoice()
    {
        $contact = Alegra::contact()->find(1);
        $product = Alegra::product()->find(1);

        $invoice = Alegra::invoice();
        $invoice->date = '2017-02-3';
        $invoice->dueDate = '2021-09-21';

        $invoice->addClient($contact);
        $invoice->addProduct($product, 2);

        $created = $invoice->create();

        $this->assertEquals('2017-02-03', $created->date);
        $this->assertEquals('2021-09-21', $created->dueDate);
    }

    public function test_all_invoices()
    {
        $invoices = Alegra::invoice()->all();

        $this->assertEquals('1', $invoices->first()->id);
    }

    public function test_find_invoice()
    {
        $invoice = Alegra::invoice()->find(1);

        $this->assertEquals(1, $invoice->id);
    }
}
