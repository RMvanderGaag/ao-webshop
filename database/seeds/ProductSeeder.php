<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Charmander',
            'price' => 10,
            'description' => 'Vuur pokémon',
            'image' => 'http://pngimg.com/uploads/pokemon/pokemon_PNG154.png',
        ]);
        DB::table('products')->insert([
            'name' => 'Squirtle',
            'price' => 10,
            'description' => 'Water pokémon',
            'image' => 'http://pngimg.com/uploads/pokemon/pokemon_PNG116.png',
        ]);
        DB::table('products')->insert([
            'name' => 'Bulbasaur',
            'price' => 10,
            'description' => 'Gras pokémon',
            'image' => 'http://pngimg.com/uploads/pokemon/pokemon_PNG122.png',
        ]);
    }
}
