<?php

use Illuminate\Database\Seeder;
use App\Models\ModelEmployeeType;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelEmployeeType::create([
            'nmFuncao' => 'Gerente',
            'salarioBase' => 500
        ]);        
        
        ModelEmployeeType::create([
            'nmFuncao' => 'Atendente',
            'salarioBase' => 200
        ]);

        ModelEmployeeType::create([
            'nmFuncao' => 'Secretário(a)',
            'salarioBase' => 300
        ]);

        
        ModelEmployeeType::create([
            'nmFuncao' => 'Serviços Gerais',
            'salarioBase' => 200
        ]);
    }
}
