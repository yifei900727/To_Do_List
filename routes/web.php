<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
use App\HTTP\Controllers\GroupController;
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
Route::resource('todolist',TodolistController::class);
Route::resource('group',GroupController::class);

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[TodolistController::class,'index'])->middleware(['auth'])->name('root');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/group', [GroupController::class,'store'])->middleware(['auth'])->name('group');
require __DIR__.'/auth.php';
