<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScoreController;


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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user/score/{user_id}','App\Http\Controllers\UserController@display_user_info');
Route::get('/users/score','App\Http\Controllers\UserController@display_users_scores');
Route::get('/section','App\Http\Controllers\SectionController@index');
Route::get('/scores', 'App\Http\Controllers\ScoreController@index');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('score',ScoreController::class);
    Route::resource('questions',QuestionController::class);
    Route::resource('user_info',UserController::class);   

});