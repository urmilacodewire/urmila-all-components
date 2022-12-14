jo-panel-routes.blade.php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\APIs\ApiController;
// use App\Http\Controllers\Admin\Master\SubcategoryController;
// use App\Http\Controllers\Admin\Timeslots\TimeslotController;
// use App\Http\Controllers\Admin\Notifications\NotificationController;
// use App\Http\Controllers\Admin\Jobs\JobController;
// use App\Http\Controllers\Auth\RegisterController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categorylist',[ApiController::class , 'categoryList']);
Route::get('subcategorylist',[ApiController::class , 'subcategoryList']);
Route::get('timeslotlist',[ApiController::class , 'timeslotList']);
Route::get('notificationlist',[ApiController::class , 'notificationList']);
Route::get('jobdetails/{id?}',[ApiController::class , 'jobdetails']);
Route::get('joblist/{id?}',[ApiController::class , 'joblist']);
Route::post('register/',[ApiController::class , 'registerApi']);
Route::post('user-personal-information/{id?}',[ApiController::class , 'userPersonalApi']);
Route::post('user-education-information/{id?}',[ApiController::class , 'userEducationApi']);
Route::post('user-skills-information/{id?}',[ApiController::class , 'userSkillsApi']);
