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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();


Route::resourceVerbs([
    'create' => 'cadastro',
    'edit' => 'editar',
    'update' => 'atualizar',
    'store' => 'salvar',
    'show' => 'visualizar',
]);


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => [Illuminate\Auth\Middleware\Authenticate::class, \App\Http\Middleware\Acl::class], 'as' => 'admin.'], function () {

    //ACL inicio
    Route::get('/permissoes', 'PermissoesController@index')->name('permissoes.index');
    Route::post('/permissoes/atualizar', 'PermissoesController@update')->name('permissoes.update');
    Route::resource('/grupos', 'GruposController');
    Route::resource('/usuarios', 'UsuariosController');
    //ACL fim

});
