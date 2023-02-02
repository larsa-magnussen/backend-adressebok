<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactNote>
 */
class ContactNoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'note' => 'test note test note test note'
        ];
    }

    public function withContact(Contact $contact)
    {
        return $this->state([
            'contact_id' => $contact->id
        ]);
    }
}
