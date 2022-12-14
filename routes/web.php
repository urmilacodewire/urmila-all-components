<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CountrystatecityController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RelationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    
    return view('welcome');
    
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::get('List',[ProductController::class,'productList'])->name('List');
     Route::get('Export',[ProductController::class,'prodExport'])->name('Export');

     //Country-State-City Dropdown
    Route::get('dropdown', [CountrystatecityController::class, 'index']);
	Route::post('api/fetch-states', [CountrystatecityController::class, 'fetchState']);
	Route::post('api/fetch-cities', [CountrystatecityController::class, 'fetchCity']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'form'])->name('form');
Route::get('display-user', [UserController::class, 'locationform']);
Route::get('display-user', [UserController::class, 'locationTrack']);

Route::resource('article',ArticleController::class);
Route::resource('author',AuthorController::class);
Route::resource('category',CategoryController::class);

Route::get('relation',[RelationController::class, 'index']);
Route::get('relations',[RelationController::class, 'onetoOne']);
