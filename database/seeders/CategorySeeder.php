<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public $categories = [
        ['name' => 'Macbook'],
        ['name' => 'Notebook'],
        ['name' => 'Tablet'],
        ['name' => 'Smartphone'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->$categories as $category){
            Category::create($category);
        }
    }
}
