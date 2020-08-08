<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('tarefas')->group(function(){
    Route::post('adicionar/{idCategoria}','TarefaController@adicionar')->name('adicionar-tarefa');
    Route::get('listar','TarefaController@listar')->name('filtro');
    Route::post('atualizar/{idCategoria}','TarefaController@atualizar')->name('completar-tarefa');
    Route::post('finalizar/{id}','TarefaController@finalizar')->name('limpar-tarefa');
    Route::get('filtrar/{id}','TarefaController@filtrar')->name('filtro');
});


Route::prefix('categorias')->group(function(){
    Route::post('adicionar','CategoriaController@adicionarCategoria');
    Route::get('listar','CategoriaController@listar')->name('listar-categorias');
});

