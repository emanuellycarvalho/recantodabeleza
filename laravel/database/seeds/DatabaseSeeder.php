<?php

use Illuminate\Database\Seeder;
use App\Models\ModelClient;
use App\Models\ModelService;
use App\Models\ModelSupplier;
use App\Models\ModelEmployee;
use App\Models\Event;
use App\Models\ModelEmployeeType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ModelClient::class, 3)->create();

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

        ModelEmployeeType::create([
            'nmFuncao' => 'Gerente',
            'salarioBase' => 500
        ]);

        ModelEmployeeType::create([
            'nmFuncao' => 'Secretário(a)',
            'salarioBase' => 300
        ]);
        
        ModelEmployeeType::create([
            'nmFuncao' => 'Atendente',
            'salarioBase' => 200
        ]);

        
        ModelEmployeeType::create([
            'nmFuncao' => 'Serviços Gerais',
            'salarioBase' => 200
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

        Event::create([
            'start' => '2020-07-20 07:30:00',
            'end' => '2020-07-20 08:30:00',
            'valor' => 39.99
        ]);

        Event::create([
            'start' => '2020-07-21 07:30:00',
            'end' => '2020-07-21 08:30:00',
            'color' => '#7842f5',
            'valor' => 39.99
        ]);

        Event::create([
            'start' => '2020-07-20',
            'end' => '2020-07-20',
            'valor' => 39.99
        ]);

        ModelCustomer::create([
            'nmCliente' => 'Maria Aparecida de Jesus',
            'sexo' => 'Feminino',
            'telefone' => '(31)98765-1234',
            'dtNasc' => '1980-05-02',
            'email' => 'mariazinha12@gmail.com',
            'senha' => '123456',
            'rua' => 'Rua Vinte e Cinco de Agosto',
            'numero' => '111',
            'complemento' => '',
            'bairro' => 'Centro', 
            'cep' => '35180-022',
            'rg' => 'MG-12.456.123',
            'cidade' => 'Timóteo',
            'foto' => ''

        ]);
        
        ModelCustomer::create([
            'nmCliente' => 'José Maria Silva',
            'sexo' => 'Masculino',
            'telefone' => '(31)95748-1893',
            'dtNasc' => '1995-01-05',
            'email' => 'jose_123@yahoo.com',
            'senha' => '123456',
            'rua' => 'Rua Sessenta e Oito',
            'numero' => '123',
            'complemento' => '',
            'bairro' => 'Olaria', 
            'cep' => '35180-200',
            'rg' => 'MG-44.568.193',
            'cidade' => 'Timóteo',
            'foto' => ''

        ]);

        ModelCustomer::create([
            'nmCliente' => 'Mikaelly Souza Vieira',
            'sexo' => 'Outro',
            'telefone' => '(31)91903-1023',
            'dtNasc' => '2000-10-23',
            'email' => 'mikaS_v23@hotmail.com',
            'senha' => '123456',
            'rua' => 'Rua Professora Ana Letro Staacks',
            'numero' => '104',
            'complemento' => '',
            'bairro' => 'Bromélias', 
            'cep' => '35180-500',
            'rg' => 'MG-43.295.103',
            'cidade' => 'Timóteo',
            'foto' => ''

        ]);

        ModelProduct::create([
            'nmProduto' => 'Shampoo anti caspa',
            'marca' => 'Clear men',
            'descricao' => 'O shampoo anti caspa clear men elimina por completo os fungos causadores da caspa e ainda deixa o cabelo com um perfume agradável',
            'qtd' => 50,
            'precoProduto' => 23,
            'comissao' => 15,
            'foto' => ''
        ]);
           
        ModelProduct::create([
            'nmProduto' => 'Escova para cabelo',
            'marca' => 'Pentes e Cia',
            'descricao' => 'A escova para cabelo é ideal para utilizar em conjunto com o secador, para modelar e secar os cabelos',
            'qtd' => 30,
            'precoProduto' => 45,
            'comissao' => 12,
            'foto' => ''
        ]);

        ModelProduct::create([
            'nmProduto' => 'Óleo de argan',
            'marca' => 'INOAR',
            'descricao' => 'O óleo de argan hidrata de fortalece os fios capilares',
            'qtd' => 25,
            'precoProduto' => 7,
            'comissao' => 10,
            'foto' => ''
        ]);

    }
}
