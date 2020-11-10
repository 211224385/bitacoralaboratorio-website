<?php
use App\Http\Controllers\ScholarGroupsController;
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

Auth::routes(['register' => false,'reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('laboratories/{laboratory}/kiosk', [LaboratoriesController::class,'kiosk'])->name('laboratories.kiosk.index');
Route::get('laboratories/reports', [LaboratoriesController::class,'reports'])->name('laboratories.reports.index');


Route::post('laboratories/{laboratory}/kiosk', [LaboratoriesController::class, 'storeKiosk'])->name('laboratories.kiosk.store');
Route::resource('laboratories', LaboratoriesController::class);

Route::resource('users', UsersController::class);

Route::delete('scholargroups/{scholar_group}/students', [ScholarGroupsController::class, 'destroyStudent'])->name('scholargroups.students.destroy');

Route::post('scholargroups/{scholar_group}/students', [ScholarGroupsController::class, 'storeStudent'])->name('scholargroups.students');
Route::resource('scholargroups', ScholarGroupsController::class);


Route::resource('sessions', SessionsController::class);


