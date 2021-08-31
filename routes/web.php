<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/usuarios', function () {
    return view('pages.users.user');
})->name('users.user');



//Route::get('/cadastro_usuario', function () {
//    return view('pages.users.user_registration');
//})->name('users.user_registration');

//Route::get('/cadastro_usuario', [RegisteredUserController::class, 'create'])
//    ->name('users.user_registration');

Route::get('/cadastro_usuario', [UserController::class, 'create'])
    ->name('pages.users.user_registration');

Route::post('/cadastro_usuario', [UserController::class, 'store'])
    ->name('pages.users.user_registration');

