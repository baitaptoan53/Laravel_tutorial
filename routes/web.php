<?php
use App\Http\Controllers\StudentContrller;
use Illuminate\Support\Facades\Route;

// Route::get('/', action: [WellcomeController::class, 'welcome'])->name('welcome');
// Route::get('/{ten}', action: [HelloController::class, 'hello'])->name('hello');
Route::group(['prefix' => 'student'], function () {
                   Route::get('/', action: [StudentContrller::class, 'index'])->name('student.index');
                   Route::get('/create', action: [StudentContrller::class, 'create'])->name('student.create');
                   Route::post('/create', action: [StudentContrller::class, 'store'])->name('student.store');
});