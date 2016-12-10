<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['namespace' => 'Admin'], function ()
{
    Route::get('/', ['as' => 'admin.login', 'uses' => 'AuthController@index']);
    Route::post('/submit', ['as' => 'admin.login.submit', 'uses' => 'AuthController@login']);
    Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AuthController@logout']);

    Route::group(['middleware' => ['auth.admin'], 'prefix' => 'admin'], function ()
    {
        Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'SiteController@index']);

        // AJAX
        Route::get('ajax/user/email', ['as' => 'ajax.user.email', 'uses' => 'AjaxController@EmailUser']);
        Route::get('ajax/lecturer/email', ['as' => 'ajax.lecturer.email', 'uses' => 'AjaxController@EmailLecturer']);
        Route::get('ajax/lecturer/nidn', ['as' => 'ajax.lecturer.nidn', 'uses' => 'AjaxController@NidnLecturer']);
        Route::get('ajax/course/name', ['as' => 'ajax.course.name', 'uses' => 'AjaxController@NameCourses']);
        Route::get('ajax/course/code', ['as' => 'ajax.course.code', 'uses' => 'AjaxController@CodeCourses']);
        Route::get('ajax/room/name', ['as' => 'ajax.room.name', 'uses' => 'AjaxController@NameRooms']);
        Route::get('ajax/room/code', ['as' => 'ajax.room.code', 'uses' => 'AjaxController@CodeRooms']);
        Route::get('ajax/teach/courses', ['as' => 'ajax.teach.courses', 'uses' => 'AjaxController@Teachsroom']);

        // User
        Route::get('users', ['as' => 'admin.user', 'uses' => 'UserController@index']);
        Route::get('users/create', ['as' => 'admin.user.create', 'uses' => 'UserController@create']);
        Route::post('users/create', ['as' => 'admin.user.store', 'uses' => 'UserController@store']);
        Route::get('users/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UserController@edit']);
        Route::post('users/update/{id?}', ['as' => 'admin.user.update', 'uses' => 'UserController@update']);
        Route::delete('users/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UserController@destroy']);

        //Day
        Route::get('days', ['as' => 'admin.days', 'uses' => 'DayController@index']);
        Route::get('days/create', ['as' => 'admin.day.create', 'uses' => 'DayController@create']);
        Route::post('days/create', ['as' => 'admin.day.store', 'uses' => 'DayController@store']);
        Route::get('days/edit/{id}', ['as' => 'admin.day.edit', 'uses' => 'DayController@edit']);
        Route::post('days/update/{id?}', ['as' => 'admin.day.update', 'uses' => 'DayController@update']);
        Route::delete('days/delete/{id}', ['as' => 'admin.day.delete', 'uses' => 'DayController@destroy']);

        //Time
        Route::get('times', ['as' => 'admin.times', 'uses' => 'TimeController@index']);
        Route::get('times/create', ['as' => 'admin.time.create', 'uses' => 'TimeController@create']);
        Route::post('times/create', ['as' => 'admin.time.store', 'uses' => 'TimeController@store']);
        Route::get('times/edit/{id}', ['as' => 'admin.time.edit', 'uses' => 'TimeController@edit']);
        Route::post('times/update/{id?}', ['as' => 'admin.time.update', 'uses' => 'TimeController@update']);
        Route::delete('times/delete/{id}', ['as' => 'admin.time.delete', 'uses' => 'TimeController@destroy']);

        //Lecturer
        Route::get('lecturers', ['as' => 'admin.lecturers', 'uses' => 'LecturersController@index']);
        Route::get('lecturers/create', ['as' => 'admin.lecturer.create', 'uses' => 'LecturersController@create']);
        Route::post('lecturers/create', ['as' => 'admin.lecturer.store', 'uses' => 'LecturersController@store']);
        Route::get('lecturers/edit/{id}', ['as' => 'admin.lecturer.edit', 'uses' => 'LecturersController@edit']);
        Route::post('lecturers/update/{id?}', ['as' => 'admin.lecturer.update', 'uses' => 'LecturersController@update']);
        Route::delete('lecturers/delete/{id}', ['as' => 'admin.lecturer.delete', 'uses' => 'LecturersController@destroy']);

        //Courses
        Route::get('courses', ['as' => 'admin.courses', 'uses' => 'CoursesController@index']);
        Route::get('courses/create', ['as' => 'admin.courses.create', 'uses' => 'CoursesController@create']);
        Route::post('courses/create', ['as' => 'admin.courses.store', 'uses' => 'CoursesController@store']);
        Route::get('courses/edit/{id}', ['as' => 'admin.courses.edit', 'uses' => 'CoursesController@edit']);
        Route::post('courses/update/{id?}', ['as' => 'admin.courses.update', 'uses' => 'CoursesController@update']);
        Route::delete('courses/delete/{id}', ['as' => 'admin.courses.delete', 'uses' => 'CoursesController@destroy']);

        //Room
        Route::get('rooms', ['as' => 'admin.rooms', 'uses' => 'RoomsController@index']);
        Route::get('rooms/create', ['as' => 'admin.room.create', 'uses' => 'RoomsController@create']);
        Route::post('rooms/create', ['as' => 'admin.room.store', 'uses' => 'RoomsController@store']);
        Route::get('rooms/edit/{id}', ['as' => 'admin.room.edit', 'uses' => 'RoomsController@edit']);
        Route::post('rooms/update/{id?}', ['as' => 'admin.room.update', 'uses' => 'RoomsController@update']);
        Route::delete('rooms/delete/{id}', ['as' => 'admin.room.delete', 'uses' => 'RoomsController@destroy']);

        //Teach
        Route::get('teachs', ['as' => 'admin.teachs', 'uses' => 'TeachController@index']);
        Route::get('teachs/create', ['as' => 'admin.teach.create', 'uses' => 'TeachController@create']);
        Route::post('teachs/create', ['as' => 'admin.teach.store', 'uses' => 'TeachController@store']);
        Route::get('teachs/edit/{id}', ['as' => 'admin.teach.edit', 'uses' => 'TeachController@edit']);
        Route::post('teachs/update/{id?}', ['as' => 'admin.teach.update', 'uses' => 'TeachController@update']);
        Route::delete('teachs/delete/{id}', ['as' => 'admin.teach.delete', 'uses' => 'TeachController@destroy']);

        //TimesNotAvailable
        Route::get('timenotavailable', ['as' => 'admin.timenotavailables', 'uses' => 'TimenotavailableController@index']);
        Route::get('timenotavailable/create', ['as' => 'admin.timenotavailable.create', 'uses' => 'TimenotavailableController@create']);
        Route::post('timenotavailable/create', ['as' => 'admin.timenotavailable.store', 'uses' => 'TimenotavailableController@store']);
        Route::get('timenotavailable/edit/{id}', ['as' => 'admin.timenotavailable.edit', 'uses' => 'TimenotavailableController@edit']);
        Route::post('timenotavailable/update/{id?}', ['as' => 'admin.timenotavailable.update', 'uses' => 'TimenotavailableController@update']);
        Route::delete('timenotavailable/delete/{id}', ['as' => 'admin.timenotavailable.delete', 'uses' => 'TimenotavailableController@destroy']);

        //timedays
        Route::get('timedays', ['as' => 'admin.timedays', 'uses' => 'TimedayController@index']);
        Route::get('timedays/create', ['as' => 'admin.timeday.create', 'uses' => 'TimedayController@create']);
        Route::post('timedays/create', ['as' => 'admin.timeday.store', 'uses' => 'TimedayController@store']);
        Route::get('timedays/edit/{id}', ['as' => 'admin.timeday.edit', 'uses' => 'TimedayController@edit']);
        Route::post('timedays/update/{id?}', ['as' => 'admin.timeday.update', 'uses' => 'TimedayController@update']);
        Route::delete('timedays/delete/{id}', ['as' => 'admin.timeday.delete', 'uses' => 'TimedayController@destroy']);

        //generate
        Route::get('generates', ['as' => 'admin.generates', 'uses' => 'GenetikController@index']);
        Route::get('generates/submit', ['as' => 'admin.generates.submit', 'uses' => 'GenetikController@submit']);
        Route::get('generates/result/{id}', ['as' => 'admin.generates.result', 'uses' => 'GenetikController@result']);
        Route::get('generates/excel/{id}', ['as' => 'admin.generates.excel', 'uses' => 'GenetikController@excel']);

    });
});
