<?php


Route::get('/', function() {
    return view('welcome');
});
Auth::routes();



Route::get('datas/{month}', 'ChartDataController@teacherClasses')->name('datas');
Route::get('months', 'ChartDataController@getAllAttendanceMonth')->name('months');







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
    Route::post('class/delete','ClassController@delete')->name('class.delete');
    

    // Route::resource('my-class', 'TeacherClassController')->name('myclass');
    Route::get('myclass', 'TeacherClassController@index')->name('myclass');

    Route::get('/download/teachers', 'AdminController@downloadTeachers')->name('loadTeacher');

    Route::get('/load/subject', 'ClassController@loadClass')->name('load');
});
Auth::routes();


