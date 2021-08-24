<?php

Route::get('send', 'Start_landing_page@sendNotification');

//admin route
Route::prefix("admin")->middleware(["Admin"])->group(function(){
    Route::get('/create', ['as' => 'admin.create', 'uses' => 'admin\AdminController@propertiesCreate']);
    Route::get('/edit/{id}', ['as' => 'admin.edit', 'uses' => 'admin\AdminController@propertiesEdit']);
    Route::post('/update', ['as' => 'admin.update', 'uses' => 'admin\AdminController@propertiesUpdate']);
    Route::post('/delete/{id}', ['as' => 'admin.delete', 'uses' => 'admin\AdminController@propertiesDelete']);
    Route::get('/properties_list', ['as' => 'admin.properties_list', 'uses' => 'admin\AdminController@propertiesList']);
    Route::get('/user_list', ['as' => 'admin.user_list', 'uses' => 'admin\AdminController@userList']);
    Route::get('/user_edit', ['as' => 'admin.user_edit', 'uses' => 'admin\AdminController@userEdit']);
    Route::get('/user_update', ['as' => 'admin.user_update', 'uses' => 'admin\AdminController@userUpdate']);
});

Route::post('/create-property', 'admin\AdminController@createProperty')->name('createProperty');

Route::get('lang/home', 'LangController@index');

Route::get('lang/change', 'LangController@change')->name('changeLang');

Route::post('/template_send', 'Start_landing_page@buyInvitation');

Route::get('/buyInvitation/{id}', 'Start_landing_page@viewInvitationPage');

Route::get('/generate_page/{id}', 'Start_landing_page@viewGeneratePage');

Route::get('/personal_page/{id}/{name}', 'Start_landing_page@viewPersonalPage');

Route::get('/admin_dashboard/{id}/{name}', 'admin\AdminController@viewAdminDashboardPage');

Route::get('/dashboard/{id}', 'admin\AdminController@maindashboard');

Route::post('/admin_login', 'admin\AdminController@adminLogin')->name('admin_login');

//PAGES and FORMS
Route::get('/', 'Start_landing_page@index');

Route::get('/contact', 'Start_landing_page@about');

Route::get('/properties', 'Start_landing_page@properties');

Route::get('/profit', 'Start_landing_page@profit');

Route::get('/courses', 'Start_landing_page@courses');

Route::get('/logout', 'Start_landing_page@index');

Route::get('/go_search', 'ProcessController@general_search_2');

//payment form paypal and stripe route
Route::get('/paypal', 'PaymentController@index');

// route for processing payment
Route::post('/paypal', 'PaymentController@payWithpaypal');

// route for check status of the payment
Route::get('/status', 'PaymentController@getPaymentStatus');

Route::get('/payment_select/{price}/{name}', 'PaymentController@payment_select');

Route::post('/payment_select1', 'PaymentController@payment_select_1');

Route::get('/stripe/{id}', 'StripeController@index');
Route::post('/stripe', 'StripeController@stripePost');


//end of payment

Route::get('/login', 'ProcessController@indexlogin');

//show view homepage form
Route::get('/home', 'ProcessController@homepage');

Route::get('/register_tutor', 'ProcessController@register_tutor')->middleware('auth');

Route::get('/store', 'ProcessController@store');
//PROCESS CONTROLLER
//insert data
Route::post('/home', 'ProcessController@store');

//delete data
Route::post('/view', 'ProcessController@destroy');

//List all data 
Route::get('/view', 'ProcessController@index');

//search data
Route::get('/search', 'ProcessController@show');

Route::get('/general_search', 'ProcessController@general_search');
// Route::get('/dynamic_search', [ProcessController::class, 'dynamic_search']);

// edit and update data
Route::get('/edit/{id}', 'ProcessController@edit');

Route::post('/update', 'ProcessController@update');

// Auth routes, login, register, forgot pass
Auth::routes();

Route::get('/clear-cache', 'Start_landing_page@clearCache');
