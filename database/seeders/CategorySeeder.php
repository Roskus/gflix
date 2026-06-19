<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Sci-Fi', 'url' => 'sci-fi'],
            ['name' => 'Comedy', 'url' => 'comedy'],
            ['name' => 'Action', 'url' => 'action'],
            ['name' => 'Adventure', 'url' => 'adventure'],
            ['name' => 'Terror', 'url' => 'terror'],
            ['name' => 'Documentary', 'url' => 'documentary'],
            ['name' => 'Romance', 'url' => 'romance'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['url' => $category['url']], $category);
        }
    }
}
