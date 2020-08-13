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

    return view('welcome');
});*/

Route::get('/', 'AuthController@dashboard')->name('adm');

/****** Tipo Viagem ******/
Route::resource('/tipo_viagem', 'TipoViagemController', ['except' => ['destroy']])->middleware(['role_or_permission:Administrador']);
Route::get('/tipo_viagem/{tipo_viagem}/delete', 'TipoViagemController@destroy')->name('tipo_viagem.destroy')->middleware(['role_or_permission:Administrador']);

/****** Sub Tipo ******/
Route::resource('/sub_tipo', 'SubTipoController', ['except' => ['destroy']])->middleware(['role_or_permission:Administrador']);
Route::get('/sub_tipo/{sub_tipo}/delete', 'SubTipoController@destroy')->name('sub_tipo.destroy')->middleware(['role_or_permission:Administrador']);

/****** Viagens ******/
Route::resource('/viagens', 'ViagemController', ['except' => ['destroy']])->middleware(['role_or_permission:Administrador']);
Route::get('/viagens/{viagen}/delete', 'ViagemController@destroy')->name('viagens.destroy')->middleware(['role_or_permission:Administrador']);

/****** Eventos ******/
Route::resource('/eventos', 'EventoController', ['except' => ['destroy']])->middleware(['role_or_permission:Administrador']);
Route::get('/eventos/{evento}/delete', 'EventosController@destroy')->name('eventos.destroy')->middleware(['role_or_permission:Administrador']);

/****** Pessoas ******/
Route::resource('/pessoas', 'PessoaController', ['except' => ['destroy']])->middleware(['role_or_permission:Administrador|Vendedor']);
Route::get('/pessoas/{pessoa}/delete', 'PessoaController@destroy')->name('pessoas.destroy')->middleware(['role_or_permission:Administrador|Vendedor']);

/****** Compras ******/
Route::resource('/compras', 'CompraController', ['except' => ['destroy']])->middleware(['role_or_permission:Administrador|Vendedor']);
Route::get('/compras/{compra}/delete', 'CompraController@destroy')->name('compras.destroy')->middleware(['role_or_permission:Administrador|Vendedor']);
Route::get('/list',          'CompraController@list')->name('compras.list');
Route::get('/vendas',        'CompraController@list')->name('compras.vendas');

/****** Parcelas ******/
Route::resource('/parcelas', 'ParcelaController', ['except' => ['destroy']])->middleware(['role_or_permission:Administrador|Vendedor']);
Route::get('/parcelas/{parcela}/delete', 'ParcelaController@destroy')->name('parcelas.destroy')->middleware(['role_or_permission:Administrador|Vendedor']);


/************/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/adm',          'AuthController@dashboard')->name('adm');
Route::get('/adm/login',    'AuthController@loginForm')->name('adm.login');
Route::get('/adm/logout',   'AuthController@logout')->name('adm.logout');
Route::post('adm/login/do', 'AuthController@login')->name('adm.login.do');

Route::get('/home', 'HomeController@index')->name('home');


/****** ACL ******/
Route::get('user/{user}/roles',      'UserController@roles')->name('user.roles');
Route::put('user/{user}/roles/sync', 'UserController@rolesSync')->name('user.rolesSync');
Route::resource('user', 'UserController');

Route::get('role/{role}/permission', 'RoleController@permissions')->name('role.permissions');
Route::put('role/{role}/permission/sync', 'RoleController@permissionsSync')->name('role.permissionsSync');
Route::resource('role', 'RoleController');

Route::resource('permission', 'PermissionController');