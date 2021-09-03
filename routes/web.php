<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;

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

//Route::get('/', function () {
//    return view('auth.login');
//});


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Route::get('/usuarios', function () {
//    return view('pages.user.users');
//})->name('user.users');


Route::resource('usuarios', UserController::class)->names('user')->parameters(['usuarios' => 'user']);

Route::resource('clientes', ClientController::class)->names('client')->parameters(['clientes' => 'client']);

Route::resource('enderecos', AddressController::class)->names('address')->parameters(['enderecos' => 'address']);

Route::resource('contatos', ContactController::class)->names('contact')->parameters(['contatos' => 'contact']);

//Route::get('/usuarios', [UserController::class, 'index'])
//    ->name('user.index');
//
//Route::get('/usuarios/novo', [UserController::class, 'create'])
//    ->name('user.create');
//
//Route::post('/usuarios', [UserController::class, 'store'])
//    ->name('user.store');

