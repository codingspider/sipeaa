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
Route::get('/user/profile/details/{id}', 'RegistrationController@user_profile');


Route::get('/unactive_user/{id}', 'UsersController@unactive');
Route::get('/active_user/{id}', 'UsersController@active');
Route::post('/user/delete/{id}', 'UsersController@delete');

Route::get('/sipeaa/blog', 'BlogController@index');
Route::get('/sipeaa/blog/post', 'BlogController@blog_post');
Route::get('article/borad', 'BlogController@article_board');

//Route::get('/about', 'BlogController@about');

Route::get('/group', 'GroupController@index');
Route::post('/creat/group', 'GroupController@create_group'); 


Route::get('/post/jobs', 'JobController@index'); 
Route::post ('/search/employes', 'JobController@search_employees'); 

Route::get('/job/details/page/{id}', 'JobController@job_details'); 
Route::post('/job/application/success', 'JobController@job_apply'); 

Route::post('/post/jobs/save', 'JobController@add_new_job'); 
Route::get('/all/jobs', 'JobController@all_job'); 
Route::get('/search/by/location/{id}', 'JobController@search_by_location'); 
Route::post('/search', 'JobController@search_by_name'); 

Route::get('/about', 'AboutController@index');


Route::get('/members/search', 'MemberController@search');

Route::post('/search/result', 'MemberController@find'); 
Route::post('search/result/job/areas', 'MemberController@find_job_area'); 

Route::get('/acounts/members', 'AccountsController@index');
Route::post('/acounts/head', 'AccountsController@head');
Route::post('/make/transaction', 'AccountsController@make_transaction');

Route::get('/transaction/manage', 'AccountsController@transactions_control');

Route::get('/transactions/details/{id}', 'AccountsController@transactions_details');




Route::get('/success/{id}', 'AccountsController@transactions_success');
Route::get('/cancel/{id}', 'AccountsController@transactions_cancel');

Route::get('/report/details', 'ReportController@reports_date_wise'); 


Route::get('/export_excel', 'ExportExcelController@index');

Route::get('/export/excel', 'ExportExcelController@excel');




Route::get('/edit/head/{id}', 'ShareController@edit');


Route::post('/head/update', 'ShareController@update');


Route::get('/delete/head/{id}', 'ShareController@delete');










