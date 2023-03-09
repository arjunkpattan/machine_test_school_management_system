<?php

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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('api/fetch-states', [App\Http\Controllers\StudentController::class, 'fetchState']);
Route::resource('students', StudentController::class)->only(['index', 'create', 'store', 'update', 'edit', 'destroy']);
// Route::resource('teachers', TeacherController::class)->only(['index', 'create', 'store', 'update', 'edit', 'destroy']);
Route::resource('student-marks', MarkController::class)->only(['index', 'create', 'store', 'update', 'edit', 'destroy']);
