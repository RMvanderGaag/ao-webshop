<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Charmander',
            'price' => 10,
            'description' => 'Vuur pokémon',
            'image' => 'http://pngimg.com/uploads/pokemon/pokemon_PNG154.png',
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Squirtle',
            'price' => 10,
            'description' => 'Water pokémon',
            'image' => 'http://pngimg.com/uploads/pokemon/pokemon_PNG116.png',
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Bulbasaur',
            'price' => 10,
            'description' => 'Gras pokémon',
            'image' => 'http://pngimg.com/uploads/pokemon/pokemon_PNG122.png',
        ])->categories()->attach(3);
    }
}
