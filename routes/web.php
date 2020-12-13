<?php

use App\Http\Controllers\AreaController;
use Illuminate\Support\Facades\Route;

use function GuzzleHttp\Promise\all;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('area/all', 'AreaController@all');
Route::resource('area', 'AreaController');

Route::get('catalogstatus/all', 'CatalogStatusController@all');
Route::get('catalogstatus/client', 'ClientController@all');
Route::resource('catalogstatus', 'CatalogStatusController');

Route::get('client/all', 'ClientController@all');
Route::resource('client', 'ClientController');

Route::get('product/all', 'ProductController@all');
Route::resource('product', 'ProductController');

Route::get('user/all', 'UserController@all');
Route::get('user/roles', 'UserController@roles');
Route::resource('user', 'UserController');

Route::get('roles/all', 'RolesController@all');
Route::resource('roles', 'RolesController');

Route::get('inventario/all', 'InventarioController@all');
Route::resource('inventario', 'InventarioController');

Route::get('despacho/all', 'DespachoController@all');
Route::get('despacho/user', 'DespachoController@user');
Route::get('despacho/area', 'DespachoController@area');
Route::get('despacho/detail/{id}', 'DespachoController@detail');
Route::get('despacho/unit/{id}', 'DespachoController@unit');
Route::get('despacho/{id}/free', 'DespachoController@free');
Route::get('despacho/status/{id}', 'DespachoController@status');
Route::resource('despacho', 'DespachoController');

Route::get('recibo/all', 'ReciboController@all');
Route::get('recibo/user', 'ReciboController@user');
Route::get('recibo/area', 'ReciboController@area');
Route::get('recibo/detail/{id}', 'ReciboController@detail');
Route::get('recibo/prontoform/{id}', 'ReciboController@prontoform');
Route::get('recibo/pdf/{id}', 'ReciboController@pdf');
Route::resource('recibo', 'ReciboController');

Route::get('place/all', 'UbicacionController@all');
Route::post('locateCreate', 'UbicacionController@locateCreate');
Route::post('warehouseCreate', 'UbicacionController@warehouseCreate');
Route::post('levelCreate', 'UbicacionController@levelCreate');
Route::delete('locateDelete/{id}', 'UbicacionController@locateDelete');
Route::delete('warehouseDelete/{id}', 'UbicacionController@warehouseDelete');
Route::delete('levelDelete/{id}', 'UbicacionController@levelDelete');
Route::resource('place', 'UbicacionController');

Route::get('remesa/all', 'RemesaController@all');
Route::get('remesa/client', 'ClientController@all');
Route::get('remesa/status/{id}', 'RemesaController@status');
Route::get('remesa/product/{id}', 'ProductController@productClient');
Route::get('remesa/productSelected/{id}', 'ProductController@productDetail');
Route::get('remesa/detail/{id}', 'RemesaController@detail');
Route::resource('remesa', 'RemesaController');

Route::get('reportes', 'ReporteController@view');
Route::get('reportes/all', 'ReporteController@all');
Route::get('reportes/client', 'ClientController@all');
Route::get('reportes/status', 'ReporteController@status');
Route::get('reportes/status/{id}', 'ReporteController@statusbyid');

Route::get('/clearCache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('webhook', 'ProntoFormController@webhook');
Route::post('webhook2', 'ProntoFormController@pdf');
