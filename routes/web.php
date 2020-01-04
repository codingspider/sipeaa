<?php

use App\Events\UserChat;

Route::group(['middleware' => ['MustBeAdmin']], function () { 
Route::get('/training/post', 'TrainingController@index');
Route::post('/training/post/success', 'TrainingController@add_training');
Route::get('training/course/list', 'TrainingCartController@training_list');
Route::post('/assign/trainer/success', 'TrainingCartController@training_assign_training');
Route::get('training/course/edit/{id}', 'TrainingCartController@training_edit');
Route::get('/view/course/order/list', 'ShippingOrderController@index');
Route::get('/blog/admin/assign', 'BlogAdminController@blog_admin_view');
Route::get('/assign/trainer/view', 'TrainingDemandController@assign_trainer_view');
Route::get('/training/lists/status', 'TrainingDemandController@training_status');
Route::get('/user/approval', 'RegistrationController@member_approve');
Route::post('/user/update', 'RegistrationController@user_update');
Route::get('/employee/approval', 'RegistrationController@employee_approve');
Route::get('/transaction/manage', 'AccountsController@transactions_control');
Route::get('/library/authorisation', 'LibraryController@library_authorising');
Route::get('/messages/','MessageController@all_message');

});

Route::post('/dashboard/personal/details/', 'ResumeController@personal_details');
Route::post('dashboard/academic/details/edit', 'ResumeController@academic_details_edit');
Route::post('/dashboard/personal/details/edit', 'ResumeController@personal_details_edit');
Route::post('/dashboard/addressdetails/details/edit', 'ResumeController@address_details_edit');
Route::post('/dashboard/career/application/details/edit', 'ResumeController@career_details_edit');
Route::post('/prefer/jobs/details/edit', 'ResumeController@prefer_details_edit');
Route::post('/dashboard/academic/training/summary/edit', 'ResumeController@training_details_edit');
Route::post('/dashboard/employment/details/edit', 'ResumeController@employement_details_edit');
Route::post('/dashboard/army/edit/submit', 'ResumeController@others_employement_details_edit');
Route::post('/dashboard/others/information/details/edit', 'ResumeController@others_details_edit');
Route::post('/dashboard/others/information/reference/edit', 'ResumeController@reference_details_edit');
//delete routes 
Route::get('/dashboard/personaldetails/delete/{id}', 'TestController@personaldetails_delete');
Route::get('/dashboard/academicdetails/delete/{id}', 'TestController@academicdetails_delete');
Route::get('/dashboard/address/details/delete/{id}', 'TestController@addressdetails_delete');
Route::get('/dashboard/career/details/delete/{id}', 'TestController@career_details_delete');
Route::get('/dashboard/prefer/job/details/delete/{id}', 'TestController@prefer_details_delete');
Route::get('/dashboard/otherrelavant/details/delete/{id}', 'TestController@other_details_delete');
Route::get('/dashboard/training/delete/{id}', 'TestController@training_details_delete');
Route::get('/dashboard/certificate/delete/{id}', 'TestController@certificate_details_delete');
Route::get('/dashboard/employment/delete/{id}', 'TestController@employment_details_delete');
Route::get('/dashboard/special/delete/{id}', 'TestController@special_details_delete');
Route::get('/dashboard/others_employ/delete/{id}', 'TestController@special_details_delete');
Route::get('/dashboard/language/delete/{id}', 'TestController@language_details_delete');
Route::get('/dashboard/refer/delete/{id}', 'TestController@refer_details_delete');

Route::get('/', 'EventController@index');

Route::get('/home', 'EventController@index');
Route::get('/events/details/{id}', 'EventController@events_details');
Route::get('/view/details/events/{id}', 'EventController@view_events_details');

Route::get('/side/slider/events/details/{id}', 'EventController@view_side_events_details');

Route::get('/registration/pages', 'RegistrationController@member_index');
Route::post('/member/registration', 'RegistrationController@member_store');
Route::post('/employee/registration', 'RegistrationController@employe_store');

Route::get('/registration/pages/employee', 'RegistrationController@employee_index');

Route::get('/error', function () {

    return view('pages.error');
    
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/logout', 'Auth\LoginController@logout');



Route::get('/user/profile/details/{id}', 'RegistrationController@user_employee_profile');
Route::get('/member/profile/details/{id}', 'RegistrationController@user_member_profile');


Route::post('/unactive_user', 'UsersController@unactive');
Route::post('/active_user', 'UsersController@active');
Route::post('/user/delete/{id}', 'UsersController@delete');



//Route::get('/about', 'BlogController@about');

Route::get('/group', 'GroupController@index');
Route::post('/creat/group', 'GroupController@create_group'); 


Route::post ('/search/employes', 'JobController@search_employees'); 




Route::get('/search/by/location/{id}', 'JobController@search_by_location'); 
Route::post('/search', 'JobController@search_by_name'); 

Route::get('/about', 'AboutController@index');




Route::post('/transaction/delete/{id}', 'AccountsController@transactions_delete');

Route::get('/transactions/details/{id}', 'AccountsController@transactions_details');

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/acounts/members', 'AccountsController@index');
    Route::post('/acounts/head', 'AccountsController@head');
    Route::post('/make/transaction', 'AccountsController@make_transaction');
    Route::get('/alumni/contribution', 'ContributionController@index');
    Route::get('/members/search', 'MemberController@search');
    Route::post('/search/result', 'MemberController@find'); 
    Route::post('search/result/job/areas', 'MemberController@find_job_area'); 
    Route::post('/upload/library', 'LibraryController@library_upload');
    Route::get('/add/library', 'LibraryController@index');
    Route::get('/training/demand', 'TrainingDemandController@index');
    Route::get('/all/training/demand', 'TrainingDemandController@all_demand_training');
    Route::get('/training/demand/list/details/{id}', 'TrainingDemandController@all_demand_training_list');
    Route::post('/vote/for/training', 'TrainingDemandController@vote_training');
    Route::get('/all/unread/messages','MessageController@all_unread_message');
    Route::get('/all/jobs', 'JobController@all_job'); 
    Route::get('/job/details/page/{id}', 'JobController@job_details'); 
    Route::get('/post/jobs', 'JobController@index'); 
    Route::get('/posted/job/edit/{id}', 'JobController@job_edit'); 
    Route::post('/job/application/success', 'JobController@job_apply'); 
    Route::post('/post/jobs/save', 'JobController@add_new_job'); 
    Route::post('/post/jobs/update', 'JobController@update_job_post'); 
    Route::get('/posted/job/delete/{id}', 'JobController@delete_job_post'); 

});

Route::get('/success/{id}', 'AccountsController@transactions_success');
Route::get('/cancel/{id}', 'AccountsController@transactions_cancel');

Route::get('/report/details', 'ReportController@reports_date_wise'); 


Route::get('/export_excel', 'ExportExcelController@index');

Route::get('/export/excel/report', 'ExportExcelController@excel');



Route::get('/edit/head/{id}', 'ShareController@edit');


Route::post('/head/update', 'ShareController@update');


Route::get('/delete/head/{id}', 'ShareController@delete');

Route::post('/make/contribution', 'ContributionController@make_contribution');



Route::post('/library/update/status', 'LibraryController@library_update_status');
Route::get('/delete/library/{id}', 'LibraryController@library_delete_status');





Route::post('/training/demand/post', 'TrainingDemandController@training_demand');
Route::get('/training/lists', 'TrainingDemandController@training_list');



Route::post('/change/status/update', 'TrainingDemandController@training_status_update');



Route::post('/assign/trainer', 'TrainingDemandController@assign_trainer');

Route::get('/training/demand/delete/{id}', 'TrainingDemandController@training_delete_status');


Route::get('training/course/details/{id}', 'TrainingCartController@details');

Route::get('training/course/delete/{id}', 'TrainingCartController@training_delete');

Route::post('training/post/update', 'TrainingCartController@training_update');


//add to cart controller
Route::post('/add/to/cart', 'CartController@add_to_cart');
Route::get('/show/cart', 'CartController@showcart');
Route::post('/update/cart', 'CartController@update_to_cart');
Route::get('/delete/cart/prodotucs/{rowId}', 'CartController@delete_to_cart');

Route::get('/course/posting/board', 'CoursePostinBoardController@index');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/add/billings/address','CartController@add_billing');

Route::post('/shipping/save/details','CartController@save_shipping');


Route::get('payment/process','CartController@payment' );

Route::post('bkash/payment/success', 'CartController@save_shipping');

Route::get('contact-us', 'ContactusController@index');
Route::post('send/contact/mail', 'ContactusController@send_mail');



Route::post('/change/course/order/status', 'ShippingOrderController@change_status');
Route::get('/delete/course/order/{id}', 'ShippingOrderController@delete_order');


Route::get('/send/email', 'MailController@mail');

Route::get('/profile', 'HomeController@members_profile');

Route::get('/employee/profile', 'HomeController@employee_profile');

Route::post('/upload/cv/online', 'CvController@cv_upload');

Route::get('/delete/cv/{id}', 'CvController@cv_delete');
Route::get('/edit/resume/online', 'CvController@resume_edit');


Route::get('event', function () {
    event(new UserChat('You have new msg'));
});

Route::get('listen', function () {
    return view('pages.listenBroadcast');
});



Route::get('test', function () {

    return App\PrivateMessage::where('id', 1)->first();
    
});

//private massage route

Route::post('get-private-message-notifications', 'PrivateMessageController@getUserNotification');
Route::post('get-private-messages', 'PrivateMessageController@getPrivateMessages');
Route::post('get-private-message', 'PrivateMessageController@getPrivateMessageById');
Route::post('get-private-message-sent', 'PrivateMessageController@getPrivateMessageSent');
Route::post('send-private-message', 'PrivateMessageController@sendPrivateMessage');

Route::post('/online/cv/create','OnlineCvController@cv_create');

Route::post('/online/cv/update/','OnlineCvController@cv_update');

Route::get('/online/member/cv/view','OnlineCvController@online_cv_view');
Route::get('/edit/page/view','OnlineCvController@online_cv_edit');


Route::get('/applied/job/list/view/{job_id}', 'JobController@actBook');

Route::get('/view_message', 'AdminMessageView@view_message');

Route::get('/read/message', 'AdminMessageView@view_message_member');

Route::post('/amin/reply/sent', 'AdminMessageView@admin_message_sent');


Route::post('/member/message/sent','MessageController@member_sendMessage');
Route::get('member/message/delete/{id}','MessageController@member_message_delete');

Route::post('/employee/message/sent','MessageController@employee_sendMessage');

Route::post('/admin/reply/sent/','MessageController@admin_users');



Route::get('/messages/viewed/{id}','MessageController@all_read_message');
Route::get('/messages/','MessageController@all_message');

Route::get('/update/inbox/','MessageController@updateInbox');


Route::get('/getUsers/{id}','MessageController@getUsers');
Route::get('/admin/message/sent/{id}','MessageController@admin_users');

Route::get('read/message/by/user/{id}','MessageController@all_read_message');


Route::post('/create/blog/admin', 'BlogAdminController@blog_admin_create');
Route::get('/blog/admin/delete/{id}', 'BlogAdminController@blog_admin_delete');
Route::get('/blog/admin/active/{id}', 'BlogAdminController@blog_admin_active');


Route::get('/sipeaa/blog', 'BlogController@index');
Route::get('/sipeaa/blog/post', 'BlogController@blog_post');
Route::get('article/borad', 'BlogController@article_board');

Route::post('/update/profile/picture', 'MemberPictureController@change_photo');

Route::post('/employee/profile/update', 'RegistrationController@employe_profile_update');

Route::post('/update/profile/picture/employee', 'ProfilePictureController@employe_profile_update_picture');


// // cache clear
Route::get('create', 'DisplayDataController@create');
Route::get('index', 'DisplayDataController@index'); 





Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::get('/clear-config', function() {
    Artisan::call('config:clear');
    return "Config is cleared";
});

