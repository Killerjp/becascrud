<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PostulantController;
use App\Http\Controllers\GrupofController;
use App\Http\Controllers\IngresogfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GastoController;


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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post',  'HomeController@post')->name('post');


Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::resource('periodos', PeriodoController::class);
Route::resource('postulants', PostulantController::class);
Route::resource('grupofs', GrupofController::class);
Route::resource('users', UserController::class);
Route::resource('cursos', CursoController::class);
Route::resource('gastos', GastoController::class);

Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('periodos', [App\Http\Controllers\PeriodoController::class, 'index'])->name('periodos.index');
Route::get('cursos', [App\Http\Controllers\CursoController::class, 'index'])->name('cursos.index');
Route::get('postulants', [App\Http\Controllers\PostulantController::class, 'index'])->name('postulants.index');
Route::get('grupofs', [App\Http\Controllers\GrupofController::class, 'index'])->name('grupofs.index');
Route::get('gastos', [App\Http\Controllers\GastoController::class, 'index'])->name('gastos.index');

Route::get('ingf/{id}store', 'App\Http\Controllers\IngresogfController@store')->name('ingf.store');
Route::get('ingf/{id}create', 'App\Http\Controllers\GrupofController@create')->name('gf.create');
Route::get('ingf/{id}edit', 'App\Http\Controllers\GrupofController@edit')->name('gf.edit');
Route::get('ingf/{id}index', 'App\Http\Controllers\GrupofController@index')->name('gf.index');
Route::get('gast/{id}create', 'App\Http\Controllers\GastoController@create')->name('gasto.create');
Route::get('gast/{id}edit', 'App\Http\Controllers\GastofController@edit')->name('gasto.edit');
Route::get('gast/{id}index', 'App\Http\Controllers\GastoController@index')->name('gasto.index');

Auth::routes();


