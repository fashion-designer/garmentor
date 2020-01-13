<?php

/**
 * Welcome Page Routes
 */
Route::group(['middleware' => 'guest'], function()
{
    Route::get('/', 'WelcomeController@welcome');
    Route::get('/contact-us', 'WelcomeController@contactUs')->name('contact-us');
    Route::post('/contact-us', 'WelcomeController@submitContactForm')->name('contact-us');
});

/**
 * User Authentication Routes
 */
Auth::routes();

/**
 * Email Verification Routes
 */
Route::group(['middleware' => 'guest', 'namespace' => 'Auth'], function()
{
    Route::get('/send-verification-admin', 'EmailVerificationController@sendVerificationAdmin')->name('send-verification-admin');
    Route::post('/send-verification-admin', 'EmailVerificationController@submitEmailAdmin')->name('send-verification-admin');
    Route::get('/verify-admin/{id}', 'EmailVerificationController@verifyAdmin')->name('verify-admin');
    Route::post('/verify-admin/{id}', 'EmailVerificationController@verifyAdminSubmit')->name('verify-admin');
    Route::get('/setup-password-admin/{id}', 'EmailVerificationController@setupAdminPassword')->name('setup-password-admin');
    Route::post('/setup-password-admin/{id}', 'EmailVerificationController@setupAdminPasswordSubmit')->name('setup-password-admin');

    Route::get('/send-verification-designer', 'EmailVerificationController@sendVerificationDesigner')->name('send-verification-designer');
    Route::post('/send-verification-designer', 'EmailVerificationController@submitEmailDesigner')->name('send-verification-designer');
    Route::get('/verify-designer/{id}', 'EmailVerificationController@verifyDesigner')->name('verify-designer');
    Route::post('/verify-designer/{id}', 'EmailVerificationController@verifyDesignerSubmit')->name('verify-designer');
    Route::get('/setup-password-designer/{id}', 'EmailVerificationController@setupDesignerPassword')->name('setup-password-designer');
    Route::post('/setup-password-designer/{id}', 'EmailVerificationController@setupDesignerPasswordSubmit')->name('setup-password-designer');

    Route::get('/send-verification-user', 'EmailVerificationController@sendVerificationUser')->name('send-verification-user');
    Route::post('/send-verification-user', 'EmailVerificationController@submitEmailUser')->name('send-verification-user');
    Route::get('/verify-user/{id}', 'EmailVerificationController@verifyUser')->name('verify-user');
    Route::post('/verify-user/{id}', 'EmailVerificationController@verifyUserSubmit')->name('verify-user');
    Route::get('/setup-password-user/{id}', 'EmailVerificationController@setupUserPassword')->name('setup-password-user');
    Route::post('/setup-password-user/{id}', 'EmailVerificationController@setupUserPasswordSubmit')->name('setup-password-user');
});

/**
 * Designer, Admin Authentication Routes
 */
Route::group(['namespace' => 'Auth', 'as' => 'auth.', 'middleware' => 'guest'], function()
{
    Route::get('admin/register', 'AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('admin/register-post', 'AdminRegisterController@register')->name('admin.register-post');
    Route::get('admin/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login-post', 'AdminLoginController@login')->name('admin.login-post');

    Route::get('designer/register', 'DesignerRegisterController@showRegistrationForm')->name('designer.register');
    Route::post('designer/register-post', 'DesignerRegisterController@register')->name('designer.register-post');
    Route::get('designer/login', 'DesignerLoginController@showLoginForm')->name('designer.login');
    Route::post('designer/login-post', 'DesignerLoginController@login')->name('designer.login-post');
});

/**
 * Logout Routes Admin, Designer
 */
Route::group(['namespace' => 'Auth'], function()
{
    Route::post('admin/logout', 'AdminLoginController@logout')->name('admin.logout')->middleware('admin');
    Route::post('designer/logout', 'DesignerLoginController@logout')->name('designer.logout')->middleware('designer');
});

/**
 * Admin Routes Group
 */
Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'admin'], function()
{
    Route::get('admin/dashboard', 'AdminDashboardController@getDashboard')->name('dashboard');

    Route::get('admin/admins-list/invite', 'AdminAdminsController@invite')->name('admins-list.invite');
    Route::post('admin/admins-list/send-invitation', 'AdminAdminsController@sendInvitation')->name('admins-list.send-invitation');
    Route::get('admin/admins-list', 'AdminAdminsController@getList')->name('admins-list');
    Route::get('admin/admins-list/edit/{id}', 'AdminAdminsController@edit')->name('admins-list.edit');
    Route::post('admin/admins-list/update/{id}', 'AdminAdminsController@update')->name('admins-list.update');

    Route::get('admin/designers-list/invite', 'AdminDesignersController@invite')->name('designers-list.invite');
    Route::post('admin/designers-list/send-invitation', 'AdminDesignersController@sendInvitation')->name('designers-list.send-invitation');
    Route::get('admin/designers-list', 'AdminDesignersController@getList')->name('designers-list');
    Route::get('admin/designers-list/edit/{id}', 'AdminDesignersController@edit')->name('designers-list.edit');
    Route::post('admin/designers-list/update/{id}', 'AdminDesignersController@update')->name('designers-list.update');

    Route::get('admin/users-list/invite', 'AdminUsersController@invite')->name('users-list.invite');
    Route::post('admin/users-list/send-invitation', 'AdminUsersController@sendInvitation')->name('users-list.send-invitation');
    Route::get('admin/users-list', 'AdminUsersController@getList')->name('users-list');
    Route::get('admin/users-list/edit/{id}', 'AdminUsersController@edit')->name('users-list.edit');
    Route::post('admin/users-list/update/{id}', 'AdminUsersController@update')->name('users-list.update');

    Route::get('admin/profile/edit', 'AdminAdminsController@editMyProfile')->name('profile.edit');
    Route::post('admin/profile/update', 'AdminAdminsController@updateMyProfile')->name('profile.update');

    Route::get('admin/contact-requests', 'AdminAdminsController@contactRequests')->name('contact-requests');
    Route::get('admin/contact-requests/view/{id}', 'AdminAdminsController@contactRequests')->name('contact-requests.view');
});

/**
 * User Routes Group
 */
Route::group(['namespace' => 'User', 'as' => 'user.', 'middleware' => 'auth'], function()
{
    Route::get('user/dashboard', 'UserDashboardController@getDashboard')->name('user.dashboard');

    Route::get('user/profile/edit', 'UserDashboardController@editMyProfile')->name('profile.edit');
    Route::post('user/profile/update', 'UserDashboardController@updateMyProfile')->name('profile.update');
});

/**
 * Designer Routes Group
 */
Route::group(['namespace' => 'Designer', 'as' => 'designer.', 'middleware' => 'designer'], function()
{
    Route::get('designer/dashboard', 'DesignerDashboardController@getDashboard')->name('dashboard');

    Route::get('designer/profile/edit', 'DesignerDashboardController@editMyProfile')->name('profile.edit');
    Route::post('designer/profile/update', 'DesignerDashboardController@updateMyProfile')->name('profile.update');
});