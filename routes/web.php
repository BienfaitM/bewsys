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

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('sections', SectionController::class);
    // Route::resource('scores',ScoreController:class);
    // Route::resource('sections',SectionController:class);
    // Route::resource('questions',QuestionController:class);


    // Route::get('/all_users', 'UserController@display_user_scores');
    // Route::resource('user_info',UserController:class);
    // Route::get('/user/user_detail/{id},'UserController@display_user_info');
    // Route::get('/student/search_user','UserController@search_user')
   

});