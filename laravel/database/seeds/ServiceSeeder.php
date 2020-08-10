<?php

use Illuminate\Database\Seeder;
use App\Models\ModelService;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelService::create([
            'nmServico' => 'Limpeza de pele',
            'descricao' => 'Limpeza de pele simples',
            'valor' => 49.99,
            'comissao' => 10
        ]);

        ModelService::create([
            'nmServico' => 'Mascara facial (ouro)',
            'descricao' => 'Aplicação da máscara de ouro por toda a face, recomendado após a limpeza de pele',
            'valor' => 19.99,
            'comissao' => 5
        ]);

        ModelService::create([
            'nmServico' => 'Mascara facial (carvão)',
            'descricao' => 'Aplicação da máscara de carvão aditivado por toda a face, recomendado após a limpeza de pele',
            'valor' => 19.99,
            'comissao' => 5
        ]);

        ModelService::create([
            'nmServico' => 'Esfoliação corporal',
            'descricao' => 'Esfoliação com ou sem granulação para remover célular mortas, hidratar e renovar a pele',
            'valor' => 39.99,
            'comissao' => 15
        ]);
    }
}
