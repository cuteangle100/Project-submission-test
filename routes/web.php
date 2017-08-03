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

Route::group(['middleware' => 'user_guest'], function() {
    Route::get('/register', 'AuthController@show_register_form')->name('register');
    Route::post('/register', 'AuthController@register')->name('register');

    Route::get('/login', 'AuthController@show_login_form')->name('login');
    Route::get('/', 'AuthController@show_login_form')->name('login');
    Route::post('/login', 'AuthController@login')->name('login');
});

//Only logged in users can access or send requests to these pages
Route::group(['middleware' => 'user_auth'], function(){

    Route::get('/create_project', 'ProjectController@create_project')->name('create_project');
    Route::post('/create_project', 'ProjectController@submit_project')->name('submit_project');
    Route::get('/projects', 'ProjectController@all_projects' )->name('projects');
    Route::post('/delete_project', 'ProjectController@delete_project' )->name('delete_project');
    Route::post('logout', 'AuthController@logout')->name('logout');

});

