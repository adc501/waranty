<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CekController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('barang', BarangController::class)->middleware('admin');
Route::resource('users', UserController::class)->middleware('admin');
Route::get('profile', [ProfileController::class, 'index']);
Route::put('profile/{id}', [ProfileController::class, 'update']);
// Route::get('profile', [UserController::class, 'pro_index']);

Route::get('/', [CekController::class, 'index']);
Route::get('show', [CekController::class, 'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/dasboard', [App\Http\Controllers\HomeController::class, 'admin'])->middleware('admin');

