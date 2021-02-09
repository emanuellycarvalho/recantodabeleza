<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

date_default_timezone_set ("America/Sao_Paulo");

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

//OTHERS
Route::resource('adm/product', 'ProductController');
Route::resource('adm/service', 'ServiceController');

//ATTENDANCE
Route::get('adm/registerPayment', 'AttendanceController@registerPaymentView')->name('registerPayment');
Route::get('getAttendances', 'AttendanceController@getAttendances')->name('getAttendances');
Route::get('getUnpaidAttendances', 'AttendanceController@getUnpaidAttendances')->name('getUnpaidAttendances');
Route::get('adm/payment/{id}', 'AttendanceController@showPayment');
Route::get('adm/attendance/create/{date}', 'AttendanceController@newCreate');
Route::head('adm/clientPayment/{id}', 'AttendanceController@pay')->name('pay');
Route::resource('adm/attendance', 'AttendanceController');

//CUSTOMER
Route::get('getCustomersCPFs', 'CustomerController@getCPFs')->name('getCustomersCPFs');
Route::get('getCustomersEmails', 'CustomerController@getEmails')->name('getCustomersEmails');
Route::resource('adm/customer', 'CustomerController');

//EMPLOYEE + TYPE
Route::get('getEmployeesCPFs', 'EmployeeController@getCPFs')->name('getEmployeesCPFs');
Route::get('getEmployeesEmails', 'EmployeeController@getEmails')->name('getEmployeesEmails');
Route::post('adm/newEmpType', 'EmployeeTypeController@store')->name('newEmpType');
Route::resource('adm/employee', 'EmployeeController');
Route::resource('adm/employeeType', 'EmployeeTypeController');

//SUPPLIER
Route::get('getSuppliersEmails', 'SupplierController@getEmails')->name('getSuppliersEmails');
Route::get('getSuppliersCNPJs', 'SupplierController@getCNPJs')->name('getSuppliersCNPJs');
Route::resource('adm/supplier', 'SupplierController');

//SCHEDULING
Route::get('adm/scheduling/create/{date}', 'SchedulingController@newCreate');
Route::resource('adm/scheduling', 'SchedulingController');

//REPORTS
Route::get('/pdfLatePayment', 'LatePaymentPdfController@geraPdf');
Route::resource('adm/paymentReport', 'PaymentReportController');

Route::get('/pdfScheduling', 'SchedulingPdfController@geraPdf');
Route::resource('adm/schedulingReport', 'SchedulingReportController');

//GENERAL
Route::view('adm/more', 'more');
Route::get('adm', 'FullCalendar@index');
Route::get('adm/index', 'FullCalendar@index');
Route::get('load-events', 'SchedulingController@loadEvents')->name('routeLoadEvents');
Route::get('getESRelationship', 'ServiceController@getEmployeeRelationship')->name('getESRelationship');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
