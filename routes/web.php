<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NetflixController;
use App\Http\Controllers\ProjectContoller;
use App\Http\Controllers\TypeZoomController;
use App\Http\Controllers\ZoomController;
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


Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function (){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('project', ProjectContoller::class);
    Route::post('/project/datatables', [ProjectContoller::class, 'datatables'])->name('project.datatables');
    Route::post('/project/select', [ProjectContoller::class, 'select'])->name('project.select');
    Route::get('/project/selected/{project}', [ProjectContoller::class, 'selected'])->name('project.selected');

    Route::resource('netflix', NetflixController::class);
    Route::post('/netflix/datatables', [NetflixController::class, 'datatables'])->name('netflix.datatables');
    
    Route::prefix('zooms')->group(function(){
        Route::resource('zoom', ZoomController::class);
        
        Route::resource('type', TypeZoomController::class);
        Route::post('/type/datatables', [TypeZoomController::class, 'datatables'])->name('type.datatables');

    });

});
