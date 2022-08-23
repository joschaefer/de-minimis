<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        User::factory()->create([
             'last_name' => 'Doe',
             'first_name' => 'John',
             'email' => 'test@example.com',
        ]);
    }
}
