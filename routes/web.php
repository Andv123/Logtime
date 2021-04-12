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
Route::get('login','Auth\LoginController@getLogin');
Route::get('','Auth\LoginController@getLogin');
Route::get('page/login','Auth\LoginController@getLogin');
Route::post('page/login', 'Auth\LoginController@postLogin');
Route::get('page/logout', 'Auth\LoginController@getLogout');

Route::group(['prefix'=>'page','middleware'=>'login'], function() {
    Route::get('home', 'PageController@getHomePage');
    Route::get('contact', 'PageController@getContact');
    Route::post('contact', 'PageController@postContact');
    Route::post('search', 'PageController@postSearch');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('', 'PageController@getProfile');
        Route::get('edit/{id}', 'PageController@getEdit');
        Route::post('edit/{id}', 'PageController@postEdit');
    });

    Route::group(['prefix' => 'overtime'], function () {
        Route::get('/{id}', 'PageController@getOvertime');
        Route::get('add/{id}', 'PageController@getAddOvertime');
        Route::post('add/{id}', 'PageController@postAddOvertime');
        Route::get('edit/{id}', 'PageController@getEditOvertime');
        Route::post('edit/{id}', 'PageController@postEditOvertime');
        Route::get('delete/{id}', 'PageController@getDeleteOvertime');
    });

    Route::group(['prefix' => 'attendence'], function () {
        Route::get('/{id}', 'PageController@getOfftime');
        Route::get('add/{id}', 'PageController@getAddOfftime');
        Route::post('add/{id}', 'PageController@postAddOfftime');
    });
});

Route::group(['prefix'=>'admin','middleware'=>'login'], function() {

    Route::post('search', 'AdminController@postSearch');
    Route::get('details/{id}', 'AdminController@getDetails');

    Route::group(['prefix' => 'home'], function () {
        Route::get('', 'AdminController@getHome');
        Route::post('list-add', 'AdminController@postListAdd');
        Route::get('list-delete/{id}', 'AdminController@getListDelete');
        Route::get('export-ot', 'AdminController@getExportOT');
        Route::get('export-off', 'AdminController@getExportOFF');
        Route::get('export-ot/{id}', 'AdminController@getExportOT_One');
    });

    Route::group(['prefix' => 'user_manage'], function () {
        Route::get('list', 'UserController@getList');
        Route::get('add', 'UserController@getAdd');
        Route::post('add', 'UserController@postAdd');
        Route::get('edit/{id}', 'UserController@getEdit');
        Route::post('edit/{id}', 'UserController@postEdit');
        Route::get('delete/{id}', 'UserController@getDelete');
        Route::get('export', 'UserController@getExport');
    });

    Route::group(['prefix' => 'attendence'], function () {
        Route::get('list', 'AttendenceController@getList');
        Route::get('add', 'AttendenceController@getAdd');
        Route::post('add', 'AttendenceController@postAdd');
        Route::get('edit/{id}', 'AttendenceController@getEdit');
        Route::post('edit/{id}', 'AttendenceController@postEdit');
        Route::get('delete/{id}', 'AttendenceController@getDelete');
        Route::get('export', 'AttendenceController@getExport');
    });

    Route::group(['prefix' => 'overtime'], function () {
        Route::get('list', 'OvertimeController@getList');
        Route::get('add', 'OvertimeController@getAdd');
        Route::post('add', 'OvertimeController@postAdd');
        Route::get('edit/{id}', 'OvertimeController@getEdit');
        Route::post('edit/{id}', 'OvertimeController@postEdit');
        Route::get('delete/{id}', 'OvertimeController@getDelete');
        Route::get('export', 'OvertimeController@getExport');
    });
});



