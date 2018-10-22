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
// Route::get('login', 'SessionsController@create')->name('login');
// Route::post('login', 'SessionsController@store');
// Route::get('logout', 'SessionsController@destroy');

Route::get('loadchart', 'ChartDataController@loadChart')->name('loadChart');

Route::get('datas/{month}', 'ChartDataController@teacherClasses')->name('datas');
Route::get('months', 'ChartDataController@getAllAttendanceMonth')->name('months');


Route::get('subject', 'ChartDataController@getAllSubject');

Route::get('maps', function(){
    return view('maps');
});




Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile','ProfileController@profile')->name('profile');
    Route::post('profile', 'ProfileController@updateProfile');
    Route::post('update-avatar', 'ProfileController@updateAvatar')->name('update-avatar');

    


    Route::resource('roles','RoleController');
    Route::post('roles/delete', 'RoleController@delete')->name('roles.delete');
    Route::resource('users','UserController');
    Route::post('users/delete','UserController@delete')->name('users.delete');

    Route::resource('class','ClassController');

    Route::get('profile/schedule', function(){
        return view('schedules.index');
    });

    // Route::get('class',' ClassController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
