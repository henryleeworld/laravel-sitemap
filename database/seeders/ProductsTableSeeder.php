<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $min = 1;
        $max = 5;
        foreach(range($min, $max) as $index)
        {
            $product = Product::create([
                'no'   => 'PR' . str_pad(fake()->unique()->numberBetween($min, $max), strlen($max), '0', STR_PAD_LEFT),
                'name' => fake()->sentence(4),
            ]);
        }
    }
}
