<?php

use Illuminate\Database\Seeder;
use App\Models\ModelSupplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelSupplier::create([
            'nmFornecedor' => 'SkinCare',
            'cnpj' => '00.378.257/0001-88',
            'telefone'  => '(31) 3455-3243',
            'email' => 'skc@gmail.com'
        ]);

        ModelSupplier::create([
            'nmFornecedor' => 'Brilho Capilar',
            'cnpj' => '00.378.257/0001-23',
            'telefone'  => '(31) 3334-2321',
            'email' => 'brilhoCapilar@gmail.com'
        ]);

        ModelSupplier::create([
            'nmFornecedor' => 'Cremes da Lu',
            'cnpj' => '00.378.257/0001-82',
            'telefone'  => '(31) 3455-3212',
            'email' => 'luciana@cosmeticos.com'
        ]);

        ModelSupplier::create([
            'nmFornecedor' => 'Beleza Rara',
            'cnpj' => '00.348.257/0001-22',
            'telefone'  => '(31) 3422-3212',
            'email' => 'belezarar@gmail.com'
        ]);
    }
}
