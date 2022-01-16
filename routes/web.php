<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\PerformanceAnswersController;


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
    Route::resource('departments',DepartmentController::class);
    Route::resource('sections',SectionController::class);
    Route::resource('questions',QuestionController::class);
    Route::resource('scores',ScoreController::class);
    Route::resource('evaluation',PerformanceAnswersController::class);
    

    Route::get('my_score_summary','App\Http\Controllers\PerformanceAnswersController@getmyscore')->name('my_score_summary');

    Route::get('employee_performance','App\Http\Controllers\PerformanceAnswersController@display_users_scores')->name('employee_performance');
    Route::get('employee_performance/created_at','App\Http\Controllers\PerformanceAnswersController@search_by_date');

    Route::get('/export-pdf', [App\Http\Controllers\PerformanceAnswersController::class, 'exportPdf'])->name('export-pdf');

    Route::get('/summary-pdf/{id}', [App\Http\Controllers\PerformanceAnswersController::class, 'summaryPdf'])->name('summary-pdf');



});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search','App\Http\Controllers\PerformanceAnswersController@search_by_date');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

