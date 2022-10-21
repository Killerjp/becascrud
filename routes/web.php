<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PostulantController;
use App\Http\Controllers\GrupofController;
use App\Http\Controllers\AdmingfController;
use App\Http\Controllers\GsadminController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\BecasController;
use App\Http\Controllers\IngresogfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\ResultController;


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
Route::resource('admigf', AdmingfController::class);
Route::resource('Gsadmin', GsadminController::class);
Route::resource('users', UserController::class);
Route::resource('cursos', CursoController::class);
Route::resource('gastos', GastoController::class);
Route::resource('documents', DocumentController::class);
Route::resource('becas', BecasController::class);
Route::resource('results', ResultController::class);

Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('export', [App\Http\Controllers\UserController::class, 'exportallusers'])->name('users.export');
Route::get('exportpr', [App\Http\Controllers\HomeController::class, 'expopostulantr'])->name('postulantr.export');
Route::get('exportpb', [App\Http\Controllers\HomeController::class, 'expopostulantb'])->name('postulantb.export');
Route::get('exportpp', [App\Http\Controllers\HomeController::class, 'expopostulantp'])->name('postulantp.export');
Route::get('periodos', [App\Http\Controllers\PeriodoController::class, 'index'])->name('periodos.index');
Route::get('cursos', [App\Http\Controllers\CursoController::class, 'index'])->name('cursos.index');
Route::get('postulants', [App\Http\Controllers\PostulantController::class, 'index'])->name('postulants.index');
Route::get('grupofs', [App\Http\Controllers\GrupofController::class, 'index'])->name('grupofs.index');
Route::get('becas', [App\Http\Controllers\BecasController::class, 'index'])->name('becas.index');
Route::get('gastos', [App\Http\Controllers\GastoController::class, 'index'])->name('gastos.index');
Route::get('results', [App\Http\Controllers\ResultController::class, 'index'])->name('results.index');

Route::get('ingf/{id}store', 'App\Http\Controllers\IngresogfController@store')->name('ingf.store');
Route::get('ingf/{id}create', 'App\Http\Controllers\GrupofController@create')->name('gf.create');
Route::get('exporano/{anope}expopostulanta', 'App\Http\Controllers\HomeController@expopostulanta')->name('postulanta.export');
Route::get('ingf/{id}edit', 'App\Http\Controllers\GrupofController@edit')->name('gf.edit');
Route::post('rs/{id}update', 'App\Http\Controllers\ResultController@update')->name('rs.update');
Route::get('ingf/{id}index', 'App\Http\Controllers\GrupofController@index')->name('gf.index');
Route::get('rs/{id}index', 'App\Http\Controllers\ResultController@index')->name('rs.index');
Route::get('gast/{id}create', 'App\Http\Controllers\GastoController@create')->name('gasto.create');
Route::get('gast/{id}edit', 'App\Http\Controllers\GastofController@edit')->name('gasto.edit');
Route::get('gast/{id}index', 'App\Http\Controllers\GastoController@index')->name('gasto.index');
Route::get('beca/{id}index', 'App\Http\Controllers\BecasController@index')->name('beca.index');

Auth::routes();


