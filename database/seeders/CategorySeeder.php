<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'Writing Instruments'],
            ['name' => 'Paper Products'],
            ['name' => 'Desk Needs'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
    }
}
}