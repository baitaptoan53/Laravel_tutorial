<?php

use App\Http\Controllers\WellcomeController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StudentContrller;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', action: [WellcomeController::class, 'welcome'])->name('welcome');
// Route::get('/{ten}', action: [HelloController::class, 'hello'])->name('hello');
Route::get('/', action: [StudentContrller::class, 'index'])->name('student.index');
Route::get('/create', action: [StudentContrller::class, 'create'])->name('student.create');
Route::post('/create', action: [StudentContrller::class, 'store'])->name('student.store');
