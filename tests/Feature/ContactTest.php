<?php

namespace MorenoRafael\Alegra\Tests\Feature;

use Morenorafael\Alegra\Facades\Alegra;
use MorenoRafael\Alegra\Tests\TestCase;

class ContactTest extends TestCase
{
    public function test_all_contact()
    {
        $contacts = Alegra::contact()->all();

        dd($contacts);
    }

    public function test_find_contact()
    {
        $contact = Alegra::contact()->find(1);

        dd($contact);
    }

    public function test_create_contact()
    {
        $contact = Alegra::contact();
        $contact->name = 'Rafael Moreno';
        $contact->identification = ['type' => 'cedula', 'number' => '20831818'];

        dd($contact->create());
    }

    public function test_update_contact()
    {
        $contact = Alegra::contact()->find(2);
        dd($contact->update(['name' => 'Producto actualizado']));
    }

    public function test_delete_contact()
    {
        $contact = Alegra::contact()->find(1);
        dd($contact->delete());

        // dd(Alegra::contact()->delete(3));
    }
}
