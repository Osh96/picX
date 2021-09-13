<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Package\PackageController;
use App\Http\Controllers\Vehicle\VehicleController;
use App\Http\Controllers\Vehicle\TypeController;
use App\Http\Controllers\Task\TaskController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', UsersController::class)->name('*', 'users');
});   

Route::prefix('manage')->name('manage.')->middleware(['can:manage-packages'])->group(function () {
    Route::resource('/package', PackageController::class)->name('*', 'data');
    
});  

Route::prefix('manage')->name('manage.')->middleware(['auth','can:manage-vehicles'])->group(function () {
    Route::resource('/vehicle', VehicleController::class)->name('*', 'data');
    Route::resource('/type', typeController::class)->name('*', 'data');
    
}); 

Route::prefix('manage')->name('manage.')->group(function () {
    Route::resource('/task', TaskController::class)->name('*', 'data' , 'datas');
}); 
