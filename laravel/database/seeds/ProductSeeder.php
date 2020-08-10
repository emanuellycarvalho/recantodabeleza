<?php

use Illuminate\Database\Seeder;
use App\Models\ModelProduct;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelProduct::create([
            'nmProduto' => 'Shampoo anti-queda 500ml',
            'marca' => 'TRESemmé',
            'descricao' => 'Cabelos mais fortes a partir da segunda lavagem.',
            'qtd' => 15,
            'precoProduto' => 17.99,
            'comissao' => 0.05
            //foto
        ]);

        ModelProduct::create([
            'nmProduto' => 'Kit Escova Semi Definitiva Zero',
            'marca' => 'Forever Liss',
            'descricao' => 'Promove redução de volume eficaz, ao mesmo tempo que hidrata e nutre os fios. Controla o volume dos cabelos, eliminando o frizz, além de proteção térmica. 100% livre de Formol. Ideal para todos os tipos de cabelo',
            'qtd' => 10,
            'precoProduto' => 99.99,
            'comissao' => 0.07
            //foto
        ]);

        ModelProduct::create([
            'nmProduto' => 'Creme Clareador Facial 30g',
            'marca' => 'Make B. Skin',
            'descricao' => 'Possui exclusivo complexo clareador que atua de forma completa, uniformizando o tom da pele e mantendo-a hidratada por até 24 horas.',
            'qtd' => 20,
            'precoProduto' => 52.90,
            'comissao' => 0.08
            //foto
        ]);

        ModelProduct::create([
            'nmProduto' => 'Creme Hidratante Desodorante para Mãos 50g',
            'marca' => 'MEN',
            'descricao' => 'Com ingredientes não gordurosos e de rápida absorção, possui textura seca e é fácil de espalhar, proporcionando cuidado e hidratação na medida certa com proteção FPS 15.',
            'qtd' => 20,
            'precoProduto' => 21.90,
            'comissao' => 0.05
            //foto
        ]);
    }
}
