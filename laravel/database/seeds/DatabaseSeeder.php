<?php

use Illuminate\Database\Seeder;
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
        $this->call([
            SupplierSeeder::class,
            EmployeeTypeSeeder::class,
            EmployeeSeeder::class,
            ServiceSeeder::class,
            ClientSeeder::class,
            ProductSeeder::class
        ]);        
               
    }
}
