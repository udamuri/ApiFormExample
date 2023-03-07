<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return redirect()->route('login.index', 'admin');
})->name('homes');


Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::get('login/{slug}', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/{slug}', [LoginController::class, 'login'])->name('login.post');
Route::post('/login/exit', [LoginController::class, 'exit'])->name('login.exit');