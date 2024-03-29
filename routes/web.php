<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BillsReceiveController;
use App\Http\Controllers\BillsPayController;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\ChartAccountController;
use App\Http\Controllers\DashboardController;

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


//Route::get('/', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('/', [DashboardController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__.'/auth.php';

//Route::get('/usuarios', function () {
//    return view('pages.user.users');
//})->name('user.users');


Route::resource('usuarios', UserController::class)->middleware(['auth'])->names('user')->parameters(['usuarios' => 'user']);

Route::resource('clientes', ClientController::class)->middleware(['auth'])->names('client')->parameters(['clientes' => 'client']);

Route::resource('enderecos', AddressController::class)->middleware(['auth'])->names('address')->parameters(['enderecos' => 'address']);

Route::resource('contatos', ContactController::class)->middleware(['auth'])->names('contact')->parameters(['contatos' => 'contact']);

Route::resource('produtos', ProductController::class)->middleware(['auth'])->names('product')->parameters(['produtos' => 'product']);

Route::resource('servicos', ServiceController::class)->middleware(['auth'])->names('service')->parameters(['servicos' => 'service']);

Route::resource('pedidos', OrderController::class)->middleware(['auth'])->names('order')->parameters(['pedidos' => 'order']);

Route::get('/return-client-address', [OrderController::class, 'returnClientAddress'])
    ->middleware('auth')
    ->name('return-client-address');

Route::get('/consult-cities', [OrderController::class, 'consultCities'])
    ->middleware('auth')
    ->name('consult-cities');

Route::resource('contas-receber', BillsReceiveController::class)->middleware(['auth'])->names('bills-receive')->parameters(['contas-receber' => 'bills-receive']);

Route::resource('contas-pagar', BillsPayController::class)->middleware(['auth'])->names('bills-pay')->parameters(['contas-pagar' => 'bills-pay']);

Route::resource('plano-contas', ChartAccountController::class)->middleware(['auth'])->names('chart-account')->parameters(['plano-contas' => 'chart-account']);

Route::get('/fluxo-caixa/saldo', [CashFlowController::class, 'balance'])
    ->middleware('auth')
    ->name('balance');

Route::get('/fluxo-caixa/resumo', [CashFlowController::class, 'abstract'])
    ->middleware('auth')
    ->name('abstract');

Route::get('/fluxo-caixa/caixa', [CashFlowController::class, 'cashier'])
    ->middleware('auth')
    ->name('cashier');

//Route::get('/usuarios', [UserController::class, 'index'])
//    ->name('user.index');
//
//Route::get('/usuarios/novo', [UserController::class, 'create'])
//    ->name('user.create');
//
//Route::post('/usuarios', [UserController::class, 'store'])
//    ->name('user.store');

