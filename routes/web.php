<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Verify email + reCaptcha
Route::get('register/success', 'Auth\RegisterController@verifyEmailFirst')->name('register.success');
Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::post('login/notrobot', 'Auth\RegisterController@notrobot')->name('login/notrobot');

// Socialite login
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::prefix('ez')->group(function () {
    Route::get('/', 'EzController@index')->name('ez');
    Route::get('/member/{user}/edit', 'EditController@showEditForm');
    Route::get('/member/{user}/history', 'EditController@showHistoryForm');
    Route::get('/member/history/cetaktour', 'EditController@cetakTour');
    Route::get('/member/history/cetaktravel', 'EditController@cetakTravel');
    Route::put('/member/{user}', 'EditController@update');
    Route::post('/contact', 'EzController@contact');
    Route::get('/{location}/location', 'EzController@location');
});
Route::prefix('ez/tour')->group(function () {
    Route::get('/', 'EzController@showtour');
    Route::get('/{tour}/detail', 'EzController@showtourdetail');
    Route::get('/{tour}/form', 'EzController@showTourForm');
    Route::get('/review', 'EzController@showReviewTourForm');
    Route::get('/payment', 'EzController@showPaymentTourForm');
    Route::post('/tours', 'EzController@tourstore');
    Route::get('/process', 'EzController@showProcessTourForm');
    Route::get('/{tourform}/e-ticket', 'EzController@eticket');
    Route::get('/{tourform}/download', 'EzController@downloadPDFTicketTour');
    Route::get('/{tourform}/cetak', 'EzController@cetakTour');
});
Route::prefix('ez/travel')->group(function () {
    Route::get('/', 'EzController@showTravel');
    Route::get('/{travel}/form', 'EzController@showTravelForm');
    Route::get('/review', 'EzController@showReviewTravelForm');
    Route::get('/payment', 'EzController@showPaymentTravelForm');
    Route::post('/travels', 'EzController@travelstore');
    Route::get('/process', 'EzController@showProcessTravelForm');
    Route::get('/{travelform}/e-ticket', 'EzController@eticketTravel');
    Route::get('/{travelform}/download', 'EzController@downloadPDFTicketTravel');
    Route::get('/{travelform}/cetak', 'EzController@cetakTravel');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');
    Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/add', 'AdminController@add')->name('admin.add');
    Route::get('/adminlist/{admin}/banned', 'AdminController@TableAdminDelete');
    Route::get('/adminlist/{admin}/restore', 'AdminController@TableAdminRestore');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/{admin}/profile', 'AdminController@showEditProfileForm');
    Route::put('/{admin}', 'AdminController@updateAdmin');
    Route::get('/tables', 'AdminController@tables')->name('admin.table');

    Route::get('/tablestour/print', 'AdminController@TableTourPrint');
    Route::get('/tablestour/{tourform}/delete', 'AdminController@TableTourDelete');

    Route::get('/tablestravel/print', 'AdminController@TableTravelPrint');
    Route::get('/tablestravel/{travelform}/delete', 'AdminController@TableTravelDelete');
    Route::get('/tablestravel/{travelform}/status', 'AdminController@editTravelStatus');

    Route::get('/tablesmember/print', 'AdminController@TableMemberPrint');
    Route::get('/tablesmember/{user}/banned', 'AdminController@TableMemberBanned');
    Route::get('/tablesmember/{user}/restore', 'AdminController@TableMemberRestore');

    Route::get('/tablesfeedback/print', 'AdminController@TableFeedbackPrint');
    Route::get('/tablesfeedback/{contact}/delete', 'AdminController@TableFeedbackDelete');

    Route::get('/tourcontent', 'AdminController@showTourContent');
    Route::post('/tourcontent/adds', 'AdminController@storeTourContent');
    Route::get('/tourcontent/{tour}/edit', 'AdminController@showEditTourForm');
    Route::put('/tourcontent/{tour}', 'AdminController@UpdateTourContent');
    Route::post('/tourcontent/tourpict', 'AdminController@storeTourPict');
    Route::get('/tourcontent/{tour}/delete', 'AdminController@deleteTourContent');

    Route::post('/driver/add', 'AdminController@storeDriver')->name('admin.driver.add');
    Route::get('/driver/{id}', 'AdminController@showDriverStatus')->name('admin.driver.edit');
    Route::get('/driver/{driver}/delete', 'AdminController@showDriverStatus')->name('admin.driver.edit');

    Route::get('/travelcontent', 'AdminController@showTravelContent');
    Route::post('/travelcontent/adds', 'AdminController@storeTravelContent');
    Route::get('/travelcontent/{travel}/edit', 'AdminController@showEditTravelForm');
    Route::put('/travelcontent/{travel}', 'AdminController@UpdateTravelContent');
    Route::get('/travelcontent/{travel}/delete', 'AdminController@deleteTravelContent');
});