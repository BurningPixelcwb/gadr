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

/*Route::get('/', function () {

    //return view('welcome');
});*/

Route::get('/', 'AuthController@dashboard')->name('adm');


Auth::routes();

/****** Tipo Viagem ******/
Route::resource('/tipo_viagem', 'TipoViagemController', ['except' => ['destroy']]);
Route::get('/tipo_viagem/{tipo_viagem}/delete', 'TipoViagemController@destroy')->name('tipo_viagem.destroy');

/****** Sub Tipo ******/
Route::resource('/sub_tipo', 'SubTipoController', ['except' => ['destroy']]);
Route::get('/sub_tipo/{sub_tipo}/delete', 'SubTipoController@destroy')->name('sub_tipo.destroy');

/****** Viagens ******/
Route::resource('/viagens', 'ViagemController', ['except' => ['destroy']]);
Route::get('/viagens/{viagen}/delete', 'ViagemController@destroy')->name('viagens.destroy');

/****** Eventos ******/
Route::resource('/eventos', 'EventoController', ['except' => ['destroy']]);
Route::get('/eventos/{evento}/delete', 'EventosController@destroy')->name('eventos.destroy');

/****** Pessoas ******/
Route::resource('/pessoas', 'PessoaController', ['except' => ['destroy']]);
Route::get('/pessoas/{pessoa}/delete', 'PessoaController@destroy')->name('pessoas.destroy');

/****** Compras ******/
Route::resource('/compras', 'CompraController', ['except' => ['destroy']]);
Route::get('/compras/{compra}/delete', 'CompraController@destroy')->name('compras.destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/************/
Route::get('/adm',          'AuthController@dashboard')->name('adm');
Route::get('/adm/login',    'AuthController@loginForm')->name('adm.login');
Route::get('/adm/logout',   'AuthController@logout')->name('adm.logout');
Route::post('adm/login/do', 'AuthController@login')->name('adm.login.do');