<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterAreaController;
use App\Http\Controllers\KeanggotaanController;
use App\Http\Controllers\MasterAnggotaController;
use App\Http\Controllers\MasterTingkatController;
use App\Http\Controllers\MasterKeluargaController;
use App\Http\Controllers\AnggotaKeluargaController;

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

Route::get('/login',[LoginController::class,'loginIndex'])->name('login');
Route::post('/login',[LoginController::class,'loginAuth']);

Route::get('/register',[LoginController::class,'registerIndex'])->name('register');
Route::post('/register',[LoginController::class,'registerStore']);

Route::get('logout',[LoginController::class, 'logOut']);


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class,'index']);
    
    // Master
    Route::resource('/mtingkat', MasterTingkatController::class);
    Route::resource('/marea', MasterAreaController::class);
    Route::resource('/mkeluarga', MasterKeluargaController::class);
    Route::resource('/manggota', MasterAnggotaController::class);
    
    // Child Master
    Route::resource('/akeluarga', AnggotaKeluargaController::class);
    Route::resource('/keanggotaan', KeanggotaanController::class);
});