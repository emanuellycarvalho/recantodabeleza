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
    public function run()
    {

        ModelEmployee::create([
            'nmFuncionario' => 'Deisymar Botega',
            'sexo' => 'Feminino',
            'dtNasc' => '1980-03-22',
            'cpf' => '151.118.976-24',
            'telefone' => '(31) 98870-5937',
            'email' => 'dbotegatavares@gmail.com',
            'senha' => '123456',
            'numero' => '165',
            'cep' => '35170-200',
            'rua' => 'Jonas Soares Camargo',
            'bairro' => 'Surinan',
            'cidade' => 'Coronel Fabriciano',
            'complemento' => 'Ao lado da igreja',
            'cdTipoFuncionario' => 1
        ]);

        ModelEmployee::create([
            'nmFuncionario' => 'Emanuelly Carvalho',
            'sexo' => 'Feminino',
            'dtNasc' => '2003-02-20',
            'cpf' => '151.118.976-21',
            'telefone' => '(31) 98870-5937',
            'email' => 'manu.eu.2022@gmail.com',
            'senha' => '123456',
            'numero' => '165',
            'cep' => '35170-200',
            'rua' => 'Jonas Soares Camargo',
            'bairro' => 'Surinan',
            'cidade' => 'Coronel Fabriciano',
            'complemento' => 'Ao lado da igreja',
            'cdTipoFuncionario' => 2
        ]);

        ModelEmployee::create([
            'nmFuncionario' => 'Fernando Souza',
            'sexo' => 'Masculino',
            'dtNasc' => '2002-12-12',
            'cpf' => '151.118.996-21',
            'telefone' => '(31) 98321-5937',
            'email' => 'fernandoSouza@gmail.com',
            'senha' => '123456',
            'numero' => '133',
            'cep' => '35170-200',
            'rua' => 'Jonas Soares Camargo',
            'bairro' => 'Surinan',
            'cidade' => 'Coronel Fabriciano',
            'complemento' => 'Em frente a igreja',
            'cdTipoFuncionario' => 2
        ]);

        ModelEmployee::create([
            'nmFuncionario' => 'Lorena Souza',
            'sexo' => 'Feminino',
            'dtNasc' => '2002-02-05',
            'cpf' => '151.243.996-21',
            'telefone' => '(31) 98321-2345',
            'email' => 'itsMeLorena@gmail.com',
            'senha' => '123456',
            'numero' => '144 A',
            'cep' => '35170-200',
            'rua' => 'Jonas Soares Camargo',
            'bairro' => 'Surinan',
            'cidade' => 'Coronel Fabriciano',
            'complemento' => 'Na rua da igreja',
            'cdTipoFuncionario' => 2
        ]);
    }
}
