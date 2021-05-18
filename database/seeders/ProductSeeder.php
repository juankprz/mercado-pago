<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Iphone',
            'price' => 40000,
            'quantity' => 1,
            'image' => 'img/iphone.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Audifonos',
            'price' => 30000,
            'quantity' => 1,
            'image' => 'img/audifonos.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Imac',
            'price' => 35000,
            'quantity' => 1,
            'image' => 'img/imac.jpg',
        ]);
    }
}
