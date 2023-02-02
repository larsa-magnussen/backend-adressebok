<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactEmail;
use App\Models\ContactNote;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'address' => fake()->address(),
            'country' => fake()->country(),
            'phone_number' => fake()->phoneNumber(),
            'country_code' => '0047',
            'date_of_birth' => fake()->date()
        ];
    }

    public function withEmails($count)
    {
        $this->afterCreating->push(function(Contact $contact) use ($count) {
            $email = ContactEmail::factory()->count($count)->withContact($contact)->create();
        });
        return $this;
    }

    public function withNotes($count)
    {
        $this->afterCreating->push(function(Contact $contact) use ($count) {
            $note = ContactNote::factory()->count($count)->withContact($contact)->create();
        });
        return $this;
    }

    // /**
    //  * Indicate that the model's email address should be unverified.
    //  *
    //  * @return static
    //  */
    // public function unverified()
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
