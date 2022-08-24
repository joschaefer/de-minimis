<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Grant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->create([
                 'last_name' => 'Mustermann',
                 'first_name' => 'Max',
                 'email' => 'test@example.com',
            ]);

        User::factory(3)
            ->create();

        Category::factory()
            ->create([
                'name' => 'Miete',
            ]);

        Category::factory()
            ->create([
                'name' => 'Beratung',
            ]);

        Category::factory()
            ->create([
                'name' => 'Verbrauchsmaterial',
            ]);

        Category::factory()
            ->create([
                'name' => 'Maschinennutzung',
            ]);

        Category::factory()
            ->create([
                'name' => 'Sonstiges',
            ]);

        Company::factory(5)
            ->has(Contact::factory(2))
            ->has(Grant::factory(3))
            ->create();
    }
}
