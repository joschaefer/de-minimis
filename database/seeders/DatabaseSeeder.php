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
                 'last_name' => 'Doe',
                 'first_name' => 'John',
                 'email' => 'test@example.com',
            ]);

        User::factory(3)
            ->create();

        Category::factory(3)
            ->create();

        Company::factory(5)
            ->has(Contact::factory(mt_rand(1, 3)))
            ->has(Grant::factory(mt_rand(2, 5)))
            ->create();
    }
}
