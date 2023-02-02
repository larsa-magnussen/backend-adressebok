<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    //eksempel på personer i databasen
    public function run()
    {
        // \App\Models\Contact::factory(10)->create();

        Contact::create([
            'first_name' => 'Lars Andreas',
            'last_name' => 'Magnussen',
            'address' => 'Eliasmarken 15',
            'country' => 'Norway',
            'phone_number' => '12345678',
            'country_code' => '+47',
            'date_of_birth' => '2000-07-10'
        ]);

        Contact::create([
            'first_name' => 'Petter',
            'last_name' => 'Hansen',
            'address' => 'Spjeldsvegen 72',
            'country' => 'Norway',
            'phone_number' => '87654321',
            'country_code' => '0047',
            'date_of_birth' => '1997-01-11'
        ]);

        Contact::create([
            'first_name' => 'Ola',
            'last_name' => 'Hansen',
            'address' => 'Adresseveien 123',
            'country' => 'Norway',
            'phone_number' => '95921315',
            'country_code' => '+47',
            'date_of_birth' => '1995-11-01'
        ]);

        Contact::create([
            'first_name' => 'Mary',
            'last_name' => 'Smith',
            'address' => 'Address 12',
            'country' => 'USA',
            'phone_number' => '11111333',
            'country_code' => '+1',
            'date_of_birth' => '2005-12-30'
        ]);

        Contact::create([
            'first_name' => 'Kari',
            'last_name' => 'Vik',
            'address' => 'Vikveien 66',
            'country' => 'Norway',
            'phone_number' => '2222111',
            'country_code' => '0047',
            'date_of_birth' => '1929-04-18'
        ]);

        Contact::create([
            'first_name' => 'Kjetil',
            'last_name' => 'Olavson',
            'address' => 'Adresseveien 125',
            'country' => 'Norway',
            'phone_number' => '93949596',
            'country_code' => '+47',
            'date_of_birth' => '1987-07-29'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
