<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
// Route::get('/all_users', [UserController::class, 'display_users_scores'])->name('home');
// Route::get('/user/{id}', [UserController::class, 'display_user_info'])->name('index');
Route::get('/users','App\Http\Controllers\UserController@index');
Route::put('/user/{id}','App\Http\Controllers\UserController@update');
// Route::get('/users/score','App\Http\Controllers\UserController@display_users_scores');
Route::get('/users/score/{id}','App\Http\Controllers\UserController@total_scores');
Route::get('/section','App\Http\Controllers\SectionController@index');






Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('sections', SectionController::class);
    // Route::resource('scores',ScoreController::class);
    Route::resource('sections',SectionController::class);
    Route::resource('questions',QuestionController::class);
    Route::resource('user_info',UserController::class);


    // Route::get('/all_users', [UserController::class, 'show']);


    // Route::get('/all_users', 'UserController@show');
    // Route::get('/user/user_detail/{name}','UserController@display_user_info');
    // Route::get('/user/search_user','UserController@search_user');
   

});