<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BlogController;

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
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get("list",[RegisterController::class,'list']);
    Route::post("blog/create",[BlogController::class,'create']);
    Route::put("blog/{id}/update", [BlogController::class,'update']);
});
Route::post("register",[RegisterController::class,'register']);
Route::post("login",[RegisterController::class,'login']);


/*
to create controller with model
php artisan make:controller PhotoController --resource --model=Photo

to migrate the table
php artisan make:migration create_profiles_table --create=profiles
php artisan migrate

to migrate purticular table
php artisan migrate --path=/database/migrations/0000_00_00_000000_create_users_table.php
*/