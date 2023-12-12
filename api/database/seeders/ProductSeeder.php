<?php

namespace Database\Seeders;

use App\Models\FoodSession;
use App\Models\Product;
use App\Models\ProductImage;
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
        $furadeita = Product::factory()->create([
            'name' => 'Furadeira',
            'price' => 4.99,
        ]);

        $furadeita->images()->create([
            'title' => 'Furadeira',
            'path' => 'https://m.media-amazon.com/images/I/51tvhQUT10L.__AC_SX300_SY300_QL70_ML2_.jpg',
        ]);
    }
}
