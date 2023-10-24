<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PjController;
use App\Http\Controllers\ApbdController;
use App\Http\Controllers\PapbController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\DocumentPjController;
use App\Http\Controllers\KeputusanPjController;
use App\Http\Controllers\DocumentApbdController;
use App\Http\Controllers\DocumentPapbController;
use App\Http\Controllers\KeputusanApbdController;
use App\Http\Controllers\KeputusanPapbController;

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
    return view('login.index');
})->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/users', UserController::class)->middleware('auth');

Route::resource('/dashboard/documentapbds', DocumentApbdController::class)->middleware('auth');
Route::resource('/dashboard/documentapbds/apbds', ApbdController::class)->middleware('auth');
Route::resource('/dashboard/documentpapbs', DocumentPapbController::class)->middleware('auth');
Route::resource('/dashboard/documentpapbs/papbs', PapbController::class)->middleware('auth');
Route::resource('/dashboard/documentpjs', DocumentPjController::class)->middleware('auth');
Route::resource('/dashboard/documentpjs/pjs', PjController::class)->middleware('auth');

Route::resource('/dashboard/keputusanapbds', KeputusanApbdController::class)->middleware('auth');
Route::resource('/dashboard/keputusanpapbs', KeputusanPapbController::class)->middleware('auth');
Route::resource('/dashboard/keputusanpjs', KeputusanPjController::class)->middleware('auth');

Route::resource('/dashboard/results', ResultController::class)->middleware('auth');

Route::resource('/dashboard/reports', ReportController::class)->middleware('auth');