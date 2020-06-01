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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-to-carrinho/{produto}', 'CarrinhoController@adicionarProduto')->name('carrinho.add')->middleware('auth');
Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index')->middleware('auth');
Route::get('/carrinho/update/{produto}', 'CarrinhoController@atualizarProduto')->name('carrinho.update')->middleware('auth');
Route::get('/carrinho/delete/{produto}', 'CarrinhoController@deletarProduto')->name('carrinho.delete')->middleware('auth');
