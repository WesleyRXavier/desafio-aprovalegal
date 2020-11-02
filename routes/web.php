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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('empresas', EmpresaController::class);
Route::resource('setores', SetorController::class);
Route::resource('funcionarios', FuncionarioController::class);
Route::resource('documentos', DocumentoController::class);
Route::resource('fluxos', FluxoController::class);
Route::get('fluxos/addFluxo/{id}', 'FluxoController@addFluxo')->name('fluxos.addFluxo');


Route::get('/e', function () {
    \App\Models\Empresa::factory()->count(4)->create();
});
Route::get('/s', function () {
    \App\Models\Setor::factory()->count(4)->create();
});

Route::get('/f', function () {
    \App\Models\Funcionario::factory()->count(4)->create();
});
Route::get('/d', function () {
    \App\Models\Documento::factory()->count(4)->create();
});


