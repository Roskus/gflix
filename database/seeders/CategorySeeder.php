<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert(['name' => 'Sci-Fi', 'url' => 'sci-fi',]);
        DB::table('category')->insert(['name' => 'Comedy', 'url' => 'comedy',]);
        DB::table('category')->insert(['name' => 'Action', 'url' => 'action',]);
        DB::table('category')->insert(['name' => 'Adventure', 'url' => 'adventure',]);
        DB::table('category')->insert(['name' => 'Terror', 'url' => 'terror',]);
        DB::table('category')->insert(['name' => 'Documentary', 'url' => 'documentary',]);
        DB::table('category')->insert(['name' => 'Romance', 'url' => 'romance',]);
    }
}
