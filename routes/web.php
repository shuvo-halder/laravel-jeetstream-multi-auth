<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['admin'])->group(function(){
    Route::get('admin/login',[AdminController::class, 'loginview'])->name('admin.loginview');
    Route::post('admin/login',[AdminController::class, 'store'])->name('admin.login');
});


// Route::prefix('admin')->middleware([])->group(function(){
//     Route::get('dashboard',[DashboardController::class, 'index'])->name('admingroupController.dashboard');
// });
