<?php

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

Route::get('/','TarefaController@listar');


Route::prefix('tarefas')->group(function(){
    Route::get('adicionar','TarefaController@index')->name('adicionar');
    Route::post('adicionar','TarefaController@adicionar')->name('adicionar-tarefa');
    Route::get('listar','TarefaController@listar')->name('filtro');
    Route::put('atualizar/{idTarefa}','TarefaController@atualizar')->name('completar-tarefa');
    Route::get('update/{idTarefa}','TarefaController@update')->name('update');
    Route::get('finalizar/{id}','TarefaController@finalizar')->name('limpar-tarefa');
    Route::get('filtrar','TarefaController@filtrar')->name('filtro');
    Route::get('visualizar/{id}','TarefaController@visualizar')->name('ver');

});


Route::prefix('categorias')->group(function(){
    Route::post('adicionar','CategoriaController@adicionarCategoria');
    Route::get('listar','CategoriaController@listar')->name('listar-categorias');
});
