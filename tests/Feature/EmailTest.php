<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api/contacts/1/emails');
        $response->assertStatus(200);
    }

    public function test_get()
    {
        $response = $this->get('/api/contacts/1/emails');
        $response->assertOk();
        $response->assertJson([
            [
                "id" => 1,
                "created_at" => "2023-02-02T08:44:21.000000Z",
                "updated_at" => "2023-02-02T08:44:21.000000Z",
                "type" => "personal",
                "email_address" => "lasra.magnussen@gmail.com",
                "contact_id" => 1
            ]
        ]);
    }

    public function random_string()
    {
        for ($i = 0; $i < 6; $i++) {
            $d = rand(1, 30) % 2;
        
            return $d ? chr(rand(65, 90)) : chr(rand(48, 57));
        }
    }

    public function create()
    {
        $randomStr = $this->random_string() .
        $this->random_string() .
        $this->random_string() .
        $this->random_string() . '@gmail.com';

        $response = $this->post('api/contacts/1/emails', [
            'type' => 'job',
            'email_address' => $randomStr
        ]);
        $response->assertCreated();
        $createdId = $response->json('id');
        return $createdId;
    }

    public function test_update()
    {
        $randomStr = $this->random_string() .
        $this->random_string() .
        $this->random_string() .
        $this->random_string() . '@gmail.com';

        $createdId = $this->create();
        $response = $this->put("api/contacts/1/emails/$createdId", [
            'email_address' => $randomStr
        ]);
        $response->assertOk();
    }

    public function test_delete()
    {
        $createdId = $this->create();
        $response = $this->delete('api/contacts/1/emails/' . $createdId);
        $response->assertOk();
    }
}
