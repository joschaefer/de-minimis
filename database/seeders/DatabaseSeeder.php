<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Grant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategorySeeder::class);

        User::factory()
            ->create([
                 'last_name' => 'Mustermann',
                 'first_name' => 'Max',
                 'email' => 'test@example.com',
            ]);

        User::factory(3)
            ->create();

        Company::factory(5)
            ->has(Contact::factory(2))
            ->has(Grant::factory(3))
            ->create();
    }
}
