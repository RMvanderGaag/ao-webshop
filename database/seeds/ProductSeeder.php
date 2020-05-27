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
        /**
         * FIRE POKEMON
         */
        Product::create([
            'name' => 'Charmander',
            'price' => 10,
            'description' => 'Vuur pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/004.png',
        ])->categories()->attach(1);

        Product::create([
            'name' => 'cyndaquil',
            'price' => 20,
            'description' => 'Vuur pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/155.png'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Blaziken',
            'price' => 200,
            'description' => 'Vuur pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/257.png'
        ])->categories()->attach([1, 4]);

        Product::create([
            'name' => 'Magmar',
            'price' => 150,
            'description' => 'Vuur pokémon',
            'image' => 'http://qtoptens.com/wp-content/uploads/2019/01/Magmar.png'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Moltres',
            'price' => 999,
            'description' => 'Vuur pokémon',
            'image' => 'https://i.redd.it/4pebdtwy5f231.png'
        ])->categories()->attach(1);

        /**
         * WATER POKEMON
         */
        Product::create([
            'name' => 'Squirtle',
            'price' => 10,
            'description' => 'Water pokémon',
            'image' => 'http://pngimg.com/uploads/pokemon/pokemon_PNG116.png',
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Quagsire',
            'price' => 50,
            'description' => 'Water pokémon',
            'image' => 'https://i.ya-webdesign.com/images/water-pokemon-png-16.png',
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Lapras',
            'price' => 100,
            'description' => 'Water pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/131.png',
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Poliwrath',
            'price' => 80,
            'description' => 'Water pokémon',
            'image' => 'https://giantbomb1.cbsistatic.com/uploads/scale_small/13/135472/1891831-062poliwrath.png',
        ])->categories()->attach([2, 4]);

        Product::create([
            'name' => 'Froakie',
            'price' => 10,
            'description' => 'Water pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/656.png',
        ])->categories()->attach(2);

        Product::create([
            'name' => 'magikarp',
            'price' => 0.50,
            'description' => 'Water pokémon',
            'image' => 'https://i.ya-webdesign.com/images/magikarp-png-3.png',
        ])->categories()->attach(2);

        /**
         * Grass POKEMON
         */
        Product::create([
            'name' => 'Bulbasaur',
            'price' => 10,
            'description' => 'Grass pokémon',
            'image' => 'http://pngimg.com/uploads/pokemon/pokemon_PNG122.png',
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Chikorita',
            'price' => 15,
            'description' => 'Grass pokémon',
            'image' => 'http://cdn.bulbagarden.net/upload/thumb/b/bf/152Chikorita.png/250px-152Chikorita.png',
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Grookey',
            'price' => 5,
            'description' => 'Grass pokémon',
            'image' => 'http://cdn.bulbagarden.net/upload/thumb/9/93/810Grookey.png/250px-810Grookey.png',
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Lotad',
            'price' => 10,
            'description' => 'Grass pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/270.png',
        ])->categories()->attach([3, 2]);

        Product::create([
            'name' => 'Sceptile',
            'price' => 250,
            'description' => 'Grass pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/254.png',
        ])->categories()->attach(3);

        /**
         * FIGHTING POKEMON
         */
        Product::create([
            'name' => 'Mankey',
            'price' => 140,
            'description' => 'Fighting pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/056.png',
        ])->categories()->attach(4);

        Product::create([
            'name' => "Sirfetch'd",
            'price' => 300,
            'description' => 'Fighting pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/865.png',
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Sawk',
            'price' => 150,
            'description' => 'Fighting pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/539.png',
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Pangoro',
            'price' => 200,
            'description' => 'Fighting pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/675.png',
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Crabrawler',
            'price' => 50,
            'description' => 'Fighting pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/739.png',
        ])->categories()->attach(4);

        /**
         * ELECTRIC POKEMON
         */
        Product::create([
            'name' => 'Zapdos',
            'price' => 999,
            'description' => 'Electric pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/145.png',
        ])->categories()->attach(5);

        Product::create([
            'name' => 'Mareep',
            'price' => 30,
            'description' => 'Electric pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/179.png',
        ])->categories()->attach(5);

        Product::create([
            'name' => 'Dedenne',
            'price' => 80,
            'description' => 'Electric pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/702.png',
        ])->categories()->attach(5);

        Product::create([
            'name' => 'Dracozolt',
            'price' => 190,
            'description' => 'Electric pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/880.png',
        ])->categories()->attach(5);

        Product::create([
            'name' => 'Shinx',
            'price' => 25,
            'description' => 'Electric pokémon',
            'image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/403.png',
        ])->categories()->attach(5);

    }
}
