	<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;



//////////////////////// Routes //////////////////


Route::get('/admin',[AuthController::class, 'getlogin'])->name('admin.login');
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('adminlogin');

Route::group(['middleware' => 'auth:admin'],function(){
	Route::post('/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');	

})	;


https://dev.to/snehalkadwe/how-to-read-content-from-pdf-document-in-laravel-8-4f6d