<?php
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LaboratoriesController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);


Route::get('nosotros', [HomeController::class, 'nosotros']);

Route::get('galeria', [HomeController::class, 'galeria']);

Route::resource('careers', CareersController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('laboratories', LaboratoriesController::class);
Auth::routes();

Route::resource('users', UsersController::class);
Auth::routes();

Route::resource('sessions', SessionsController::class);
Auth::routes();