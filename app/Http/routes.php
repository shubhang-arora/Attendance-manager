<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('addCourse');
    });
    Route::get('/attendance', function () {
        return view('putAttendance');
    });

    Route::get('/dd', 'CoursesController@dd');

});
Route::post('/addCourse', 'CoursesController@addCourse');

Route::get('/auth/logout', 'AuthNewController@logout');
Route::get('/auth/google','AuthNewController@handleProviderCallback');
Route::get('/auth/verify','AuthNewController@verifyUser');
Route::post('/auth/verify','AuthNewController@verifyUserPost');
Route::get('/auth/login', 'AuthNewController@redirectToProvider');
