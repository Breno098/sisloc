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
        ]);

        $furadeita->images()->create([
            'title' => 'Furadeira',
            'path' => 'https://cdn.awsli.com.br/600x450/1683/1683736/produto/89189061/48b63903b7.jpg',
        ]);

        $martelo = Product::factory()->create([
            'name' => 'Martelo',
        ]);

        $martelo->images()->create([
            'title' => 'Martelo',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/166523-0-0/MARTELO-UNHA-CABO-MADEIRA-20MM-1.jpg?v=638240810817100000',
        ]);

        $martelo->images()->create([
            'title' => 'Martelo',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/166540-0-0/MARTELO-UNHA-CABO-MADEIRA-25MM-4.jpg?v=638240836474330000',
        ]);

        $esmerilhadeira = Product::factory()->create([
            'name' => 'Esmerilhadeira',
        ]);

        $esmerilhadeira->images()->create([
            'title' => 'Esmerilhadeira',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/159949-1000-1000/ESMERILHADEIRA-ANGULAR-BLACK-DECKER-4--1-2-POL.jpg?v=637737909944970000',
        ]);
    }
}
