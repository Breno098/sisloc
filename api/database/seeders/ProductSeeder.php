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
            'description' => 'O Martelo Unha 51-270S tem cabeça feita em aço SAE 1045/1050. Cabo em madeira com acabamento lixado e jateado para evitar lascas, garantindo maior conforto no manuseio.'
        ]);

        $martelo->images()->create([
            'title' => 'MARTELO UNHA STANLEY COM CABO DE MADEIRA',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/166523-0-0/MARTELO-UNHA-CABO-MADEIRA-20MM-1.jpg?v=638240810817100000',
        ]);

        $martelo->images()->create([
            'title' => 'MARTELO UNHA STANLEY COM CABO DE MADEIRA',
            'path' => 'https://madmais.vteximg.com.br/arquivos/ids/166540-0-0/MARTELO-UNHA-CABO-MADEIRA-25MM-4.jpg?v=638240836474330000',
        ]);

        $martelo->images()->create([
            'title' => 'MARTELO UNHA STANLEY COM CABO DE MADEIRA',
            'path' => ' https://madmais.vteximg.com.br/arquivos/ids/166541-0-0/MARTELO-UNHA-CABO-MADEIRA-25MM-5.jpg?v=638240836477770000',
        ]);

        $esmerilhadeira = Product::factory()->create([
            'name' => 'ESMERILHADEIRA ANGULAR 4 1/2 POL. ',
            'description' => 'Ideal para desbaste em peças metálicas, acabamentos sobre soldas, remoção de rebarbas de peças fundidas, limpeza de superfícies enferrujadas ou com tinta.',

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
            'description' => 'Uso em construção civil, empreiteiras, departamentos de manutenção e instaladores em geral para perfurações de paredes, tetos, pisos, alvenaria ou rochas para instalações de pontos de fixação, passagens de tubos e fios; Perfurações de paredes, tetos e pisos de concreto, alvenaria ou rochas para instalação de pontos de fixação e passagem de tubos e fios; Perfurações em perfis metálicos, madeiras e plásticos (necessário o uso de adaptador e mandril, não fornecidos com o produto); Pequenas operações de rompimento em alvenaria.'
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
            'description' => 'Indicada para uso em marcenarias, serralherias, instaladores e construção civil.'
        ]);

        $furadeita->images()->create([
            'title' => 'FURADEIRA DE IMPACTO 3/8 POL.',
            'path' => 'https://cdn.awsli.com.br/600x450/1683/1683736/produto/89189061/48b63903b7.jpg',
        ]);
    }
}
