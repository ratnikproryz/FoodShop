<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Product::factory(20)->create()->each(function ($item){
            $item->pictures()->create([
                'picture' => '/storage/product/matcha.jpg'
            ]);
          });
    }
}
