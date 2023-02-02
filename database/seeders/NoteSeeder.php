<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\ContactNote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
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
        ContactNote::factory()->withContact($contact)->create();
    }
}
