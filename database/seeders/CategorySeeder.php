<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        foreach (['Miete', 'Beratung', 'Verbrauchsmaterial', 'Maschinennutzung', 'Sonstiges'] as $category) {
            Category::factory()->create(['name' => $category]);
        }
    }
}
