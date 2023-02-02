<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // tester at status er 200(OK) og at "wdasdwadwadwadaw" ikke finnes i output
    public function test_example()
    {
        $response = $this->get('/api/contacts');

        $response->assertStatus(200);
        $response->assertDontSee('wdasdwadwadwadaw');
    }

    // tester at GET fungerer som det skal
    // assertExactJson() sjekker at output er nøyaktig slik som er spesifisert
    public function test_get()
    {
        $response = $this->get('api/contacts/1');
        $response->assertOk();
        $response->assertJson([
            'data' => [
                "fornavn" => "Petter",
                "etternavn" => "Hansen",
                "adresse" => "Eliasmarken 15",
                "tlf" => "+475454664662352",
                "landskode" => "+47",
                'land' => 'Norway',
                "age" => 22,
                "id" => 1
            ]
        ]);
    }


    // lager en ny kontakt
    public function create()
    {
        $response = $this->post('api/contacts/', [
            'first_name' => 'Lars',
            'last_name' => 'Olsen',
            'address' => 'Adresseveien 55',
            'country' => 'Norway',
            'phone_number' => '' . random_int(10000, 12312312313132),
            'date_of_birth' => '2000-01-01',
            'country_code' => '0047'
        ]);
        $response->assertCreated();
        $createdId = $response->json('id');
        return $createdId;
    }

    // tester å oppdatere en kontakt vi lager ved å kalle på create()
    public function test_update()
    {
        $createdId = $this->create();
        $randomPhoneNumber = '' . random_int(10000, 12312312313132);
        $response = $this->put("api/contacts/$createdId", [
            'phone_number' => $randomPhoneNumber
        ]);
        $countryCode = '0047';
        $response->assertJsonFragment([
            'tlf' => $countryCode . $randomPhoneNumber
        ]);
    }

    // tester å slette en kontakt vi lager ved å kalle på create()
    public function test_delete()
    {
        $createdId = $this->create();
        $response = $this->delete('api/contacts/' . $createdId);
        $response->assertOk();
    }

    public function test_emailFactory()
    {
        $contact = Contact::factory()->count(4)->withEmails(2)->create();
        $this->assertNotNull($contact);
    }

    public function test_noteFactory()
    {
        $contact = Contact::factory()->count(2)->withNotes(2)->create();
        $this->assertNotNull($contact);
    }
}
