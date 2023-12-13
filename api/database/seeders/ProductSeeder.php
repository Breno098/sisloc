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
        $martelo = Product::factory()->create([
            'name' => 'MARTELO UNHA STANLEY COM CABO DE MADEIRA',
        ]);

        $martelo->images()->create([
            'title' => 'MARTELO UNHA STANLEY COM CABO DE MADEIRA',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/166523-0-0/MARTELO-UNHA-CABO-MADEIRA-20MM-1.jpg?v=638240810817100000',
        ]);

        $martelo->images()->create([
            'title' => 'MARTELO UNHA STANLEY COM CABO DE MADEIRA',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/166540-0-0/MARTELO-UNHA-CABO-MADEIRA-25MM-4.jpg?v=638240836474330000',
        ]);
        

        $esmerilhadeira = Product::factory()->create([
            'name' => 'ESMERILHADEIRA ANGULAR 4 1/2 POL. ',
        ]);

        $esmerilhadeira->images()->create([
            'title' => 'ESMERILHADEIRA ANGULAR 4 1/2 POL. ',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/159949-1000-1000/ESMERILHADEIRA-ANGULAR-BLACK-DECKER-4--1-2-POL.jpg?v=637737909944970000',
        ]);

        $esmerilhadeira->images()->create([
            'title' => 'ESMERILHADEIRA ANGULAR 4 1/2 POL. ',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/159951-0-0/ESMERILHADEIRA-ANGULAR-BLACK-DECKER-4--1-2-POL-.jpg?v=637737910457930000',
        ]);

        $martelete = Product::factory()->create([
            'name' => 'MARTELETE ELETROPNEUMÁTICO PERFURADOR',
        ]);

        $martelete->images()->create([
            'title' => 'MARTELETE ELETROPNEUMÁTICO PERFURADOR',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/156068-0-0/MARTELETE-ELETROPNEUMATICO-DEWALT-PERFURADOR-ROMPEDOR-26MM-110V-COM-MALETA-D25133K-2.jpg?v=637257521523770000',
        ]);

        $martelete->images()->create([
            'title' => 'MARTELETE ELETROPNEUMÁTICO PERFURADOR',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/156067-150-150/MARTELETE-ELETROPNEUMATICO-DEWALT-PERFURADOR-ROMPEDOR-26MM-110V-COM-MALETA-D25133K.jpg?v=637257521513800000',
        ]);

        $furadeita = Product::factory()->create([
            'name' => 'FURADEIRA DE IMPACTO 3/8 POL.',
        ]);

        $furadeita->images()->create([
            'title' => 'FURADEIRA DE IMPACTO 3/8 POL.',
            'path' => 'https://cdn.awsli.com.br/600x450/1683/1683736/produto/89189061/48b63903b7.jpg',
        ]);
    }
}
