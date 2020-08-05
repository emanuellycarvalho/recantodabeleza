<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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

Route::get('/adm', 'FullCalendar@index');
Route::get('/load-events', 'SchedulingController@loadEvents')->name('routeLoadEvents');
/*
Route::get('/', 'ClientController@index');
*/
Route::view('adm/more', 'more');
Route::resource('adm/product', 'ProductController');
Route::resource('adm/employee', 'EmployeeController');
Route::resource('adm/supplier', 'SupplierController');
Route::resource('adm/scheduling', 'SchedulingController');
Route::resource('adm/attendance', 'AttendanceController');
//Route::get('employee/search', 'EmployeeController@search');
Route::resource('adm/employeeType', 'EmployeeTypeController');
Route::get('adm/scheduling/create/{date}', 'SchedulingController@create');
Route::get('adm/scheduling/create', function() {
    $url = 'adm/scheduling/create/' . Carbon::now()->format('Y-m-d');
    return redirect($url);
});

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