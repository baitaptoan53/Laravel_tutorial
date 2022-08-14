<?php

use App\Http\Controllers\StudentContrller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', action: [WellcomeController::class, 'welcome'])->name('welcome');
// Route::get('/{ten}', action: [HelloController::class, 'hello'])->name('hello');
// Route::group(['prefix' => 'student'], function () {
//                    Route::get('/', action: [StudentContrller::class, 'index'])->name('student.index');
//                    Route::get('/create', action: [StudentContrller::class, 'create'])->name('student.create');
//                    Route::post('/create', action: [StudentContrller::class, 'store'])->name('student.store');
//                    Route::delete('/destroy/{student}', [StudentContrller::class, 'destroy'])->name('student.destroy');
//                    Route::get('/edit/{student}', action: [StudentContrller::class, 'edit'])->name('student.edit');
//                    Route::put('/edit/{student}', action: [StudentContrller::class, 'update'])->name('student.update');
// });
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'processLogin'])->name('process_login');
Route::group([
], function () {
                   Route::resource('student', StudentContrller::class)->except(['show']);
                   Route::get('/student/api', [StudentContrller::class, 'api'])->name('student.api');
                   // Route::get('/test' , function(){
                   //     return view('layout.master');
                   // });
                   Route::get('/courses/api', [CourseController::class, 'api'])->name('courses.api');
                   Route::resource('courses', CourseController::class)->except(['show']);
});
