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



Route::get('/', 'EventController@index');

Route::get('/home', 'EventController@index');
Route::get('/events/details/page/{id}', 'EventController@events_details');

Route::get('/registration/pages', 'RegistrationController@member_index');
Route::get('/registration/pages/employee', 'RegistrationController@employee_index');

Route::post('/employee/registration', 'RegistrationController@employe_store');
Route::post('/member/registration', 'RegistrationController@member_store');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/user/approval', 'RegistrationController@member_approve');


Route::get('/unactive_user/{id}', 'UsersController@unactive');
Route::get('/active_user/{id}', 'UsersController@active');
Route::post('/user/delete/{id}', 'UsersController@delete');

Route::get('/sipeaa/blog', 'BlogController@index');
Route::get('/sipeaa/blog/post', 'BlogController@blog_post');

Route::get('/about', 'BlogController@about');




