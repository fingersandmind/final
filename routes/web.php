<?php

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
Route::get('/', function() {
    return view('welcome');
});
Auth::routes();







// Route::get('register', 'RegistrationController@create');
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store');

Route::get('attendance', 'ChartDataController@subjectData');
Route::get('loadchart', 'ChartDataController@loadChart')->name('loadChart');



Route::get('subject', 'ChartDataController@getAllSubject');
Route::get('months', 'ChartDataController@getAllAttendanceMonth');




Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile','ProfileController@profile')->name('profile');
    Route::post('profile', 'ProfileController@updateAvatar');
    // Route::post('profile', 'ProfileController@updateProfile');

    
    Route::get('logout', 'SessionsController@destroy');



    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::post('users/delete','UserController@delete')->name('users.delete');

    Route::resource('class','ClassController');

    Route::get('profile/schedule', function(){
        return view('schedules.index');
    });

    // Route::get('class',' ClassController@index');
});