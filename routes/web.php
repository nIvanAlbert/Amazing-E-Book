<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}',[HomeController::class,'detail'])->name('detail');
Route::get('/profile',[HomeController::class,'profile'])->name('profile');
Route::post('/modProfile',[HomeController::class,'updateProfile'])->name('modProfile');

Route::post('/rent/{id}',[HomeController::class, 'rent'])->name('rent');
Route::get('/cart',[HomeController::class,'rentCart'])->name('cart');

Route::post('/deleteCart/{id}',[HomeController::class,'deleteCart'])->name('deleteCart');
Route::post('/submitRent',[HomeController::class,'submitRent'])->name('submit');

Route::get('/accMaintenance',[HomeController::class,'accMaintenance'])->name('accMaintenance');
Route::get('/editRole/{id}',[HomeController::class,'editRole'])->name('editRole');
Route::post('/updateRole/{id}',[HomeController::class,'updateRole'])->name('updateRole');
Route::post('/deleteAcc/{id}',[HomeController::class,'deleteAcc'])->name('deleteAcc');


   