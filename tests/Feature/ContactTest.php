<?php

namespace MorenoRafael\Alegra\Tests\Feature;

use Morenorafael\Alegra\Facades\Alegra;
use MorenoRafael\Alegra\Tests\TestCase;

class ContactTest extends TestCase
{
    public function test_create_contact()
    {
        $contact = Alegra::contact();
        $contact->name = 'Contacto Prueba';
        $contact->identification = ['type' => 'cedula', 'number' => '12345678'];

        $created = $contact->create();

        $this->assertEquals('Contacto Prueba', $created->name);
    }

    public function test_all_contacts()
    {
        $contacts = Alegra::contact()->all();

        $this->assertEquals(1, $contacts->first()->id);
    }

    public function test_find_contact()
    {
        $contact = Alegra::contact()->find(1);

        $this->assertEquals('Contacto Prueba', $contact->name);
    }

    public function test_update_contact()
    {
        $contact = Alegra::contact()->find(1);

        $updated = $contact->update(['name' => 'Contacto actualizado']);

        $this->assertEquals('Contacto actualizado', $updated->name);
    }

    public function test_delete_contact()
    {
        $contact = Alegra::contact()->find(1);

        $deleted = $contact->delete();

        $this->assertTrue($deleted);
    }
}
