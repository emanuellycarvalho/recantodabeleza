<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', 'ClientController@index');
*/
Route::resource('adm/supplier', 'SupplierController');
Route::resource('adm/employee', 'EmployeeController');

Route::get('/cep', function(){
    $cepResponse = cep('01010000');
    $data = $cepResponse->getCepModel();
    return response()->json($data);
 });
 
 Route::get('/endereco', function(){
     $enderecoResponse = endereco('sp','são paulo','ave');
     $data = $enderecoResponse->getCepModels();        
     return response()->json($data);
  });