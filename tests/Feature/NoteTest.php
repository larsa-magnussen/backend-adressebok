<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_get()
    {
        $response = $this->get('/api/contacts/1/notes');
        $response->assertOk();
        $response->assertJson([
            [
                "id" => 1,
                "created_at" => "2023-02-02T09:30:48.000000Z",
                "updated_at" => "2023-02-02T09:30:48.000000Z",
                "note" => "wadasdwasdwasd",
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
        $this->random_string();

        $response = $this->post('api/contacts/1/notes', [
            'note' => $randomStr
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
        $this->random_string();

        $createdId = $this->create();
        $response = $this->put("api/contacts/1/notes/$createdId", [
            'note' => $randomStr
        ]);
        $response->assertOk();
    }

    public function test_delete()
    {
        $createdId = $this->create();
        $response = $this->delete('api/contacts/1/notes/' . $createdId);
        $response->assertOk();
    }
}
