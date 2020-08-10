<?php

use Illuminate\Database\Seeder;
use App\Models\ModelClient;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ModelClient::class, 3)->create();
    }
}
