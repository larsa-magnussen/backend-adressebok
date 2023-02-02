<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactEmail>
 */
class ContactEmailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
            'type' => 'personal',
            'email_address' => fake()->email()
        ];
    }
    public function withContact(Contact $contact)
    {
        return $this->state([
            'contact_id' => $contact->id
        ]);
    }
}
