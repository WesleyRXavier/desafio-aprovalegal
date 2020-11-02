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
})->name('inicio');


Route::resource('empresas', EmpresaController::class);
Route::resource('setores', SetorController::class);
Route::resource('funcionarios', FuncionarioController::class);
Route::resource('documentos', DocumentoController::class);
Route::resource('fluxos', FluxoController::class);
Route::get('fluxos/addFluxo/{id}', 'FluxoController@addFluxo')->name('fluxos.addFluxo');





