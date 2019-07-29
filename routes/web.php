<?php

/**
 * Welcome Page Routes
 */
Route::group(['middleware' => 'guest'], function()
{
    Route::get('/', 'WelcomeController@welcome');
});

/**
 * User Authentication Routes
 */
Auth::routes();

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
    Route::get('admin/dashboard', 'AdminDashboardController@getDashboard')->name('admin.dashboard');

    Route::get('admin/measurements/list', 'AdminMeasurementChartsController@list')->name('admin.measurements.list');
    Route::get('admin/measurements/create', 'AdminMeasurementChartsController@create')->name('admin.measurements.create');
    Route::post('admin/measurements/post', 'AdminMeasurementChartsController@post')->name('admin.measurements.post');
});

/**
 * User Routes Group
 */
Route::group(['namespace' => 'User', 'as' => 'user.', 'middleware' => 'auth'], function()
{
    Route::get('user/dashboard', 'UserDashboardController@getDashboard')->name('user.dashboard');
});

/**
 * Designer Routes Group
 */
Route::group(['namespace' => 'Designer', 'as' => 'designer.', 'middleware' => 'designer'], function()
{
    Route::get('designer/dashboard', 'DesignerDashboardController@getDashboard')->name('designer.dashboard');
});