<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $min = 1;
        $max = 5;
        $faker = Faker\Factory::create();
        foreach(range($min, $max) as $index)
        {
            $product = Product::create([
                'no'   => 'PR' . str_pad($faker->unique()->numberBetween($min, $max), strlen($max), '0', STR_PAD_LEFT),
                'name' => $faker->sentence(4),
            ]);
        }
    }
}
