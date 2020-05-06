<?php

use Illuminate\Database\Seeder;
use App\Models\ModelEmployee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ModelEmployee $employee)
    {
        $employee->create([
            'nmFuncionario' => 'Emanuelly Carvalho',
            'sexo' => 'Feminino',
            'dtNasc' => '2000-02-20',
            'cpf' => '151.118.976-21',
            'telefone' => '(31) 98870-5935',
            'email' => 'manu.eu.2000@gmail.com',
            'senha' => '123456',
            'numero' => '151',
            'cep' => '35170-200',
            'rua' => 'Jonas Soares Camargo',
            'bairro' => 'Surinan',
            'cidade' => 'Coronel Fabriciano',
            'complemento' => NULL,
            'tipo' => 2
        ]);

        $employee->create([
            'nmFuncionario' => 'Fernando Souza',
            'sexo' => 'Masculino',
            'dtNasc' => '2000-05-23',
            'cpf' => '151.342.976-21',
            'telefone' => '(31) 9843-4432',
            'email' => 'fernando12@gmail.com',
            'senha' => '123456',
            'numero' => '123',
            'cep' => '35170-200',
            'rua' => 'Jonas Soares Camargo',
            'bairro' => 'Surinan',
            'cidade' => 'Coronel Fabriciano',
            'complemento' => NULL,
            'tipo' => 4
        ]);
    }
}
