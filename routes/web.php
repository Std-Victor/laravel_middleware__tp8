<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', fn()=> 'hello form home page')->middleware(\App\Http\Middleware\JournalIpClient::class);

Route::get('/login', [\App\Http\Controllers\loginController::class, 'index']);
Route::post('/login', [\App\Http\Controllers\loginController::class, 'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\loginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [\App\Http\Controllers\dashbordController::class, 'index'])
    ->middleware([\App\Http\Middleware\dashboardAccessMiddleware::class, \App\Http\Middleware\sessionTimeOuteMiddleware::class.':600']);
