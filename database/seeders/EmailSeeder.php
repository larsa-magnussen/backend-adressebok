<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\ContactEmail;
use Database\Factories\ContactEmailFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactId = $this->command->ask('whatever');
        $contact = Contact::findOrFail($contactId);
        ContactEmail::factory()->withContact($contact)->create();
    }
}
