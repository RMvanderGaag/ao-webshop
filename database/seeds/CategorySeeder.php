<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Fire',
            'image' => 'img/Fire.png'
        ]);
        Category::create([
            'name' => 'Water',
            'image' => 'img/Water.png'
        ]);
        Category::create([
            'name' => 'Grass',
            'image' => 'img/Grass.png'
        ]);
        Category::create([
            'name' => 'Fighting',
            'image' => 'img/Fighting.png'
        ]);
        Category::create([
            'name' => 'Electric',
            'image' => 'img/Electric.png'
        ]);
    }
}
