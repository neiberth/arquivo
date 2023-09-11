<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\ProcessoController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('app')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::resource('caixa', CaixaController::class);
    Route::resource('processo', ProcessoController::class);
    Route::get('processo/gerador-pdf/{id}', [PDFController::class, 'generatePDF'])->name('pdf');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
