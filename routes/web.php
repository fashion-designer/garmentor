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
    Route::get('admin/dashboard', 'AdminDashboardController@getDashboard')->name('dashboard');

    Route::get('admin/admins-list/create', 'AdminAdminsController@create')->name('admins-list.create');
    Route::post('admin/admins-list/save', 'AdminAdminsController@save')->name('admins-list.save');
    Route::get('admin/admins-list', 'AdminAdminsController@getList')->name('admins-list');
    Route::get('admin/admins-list/edit/{id}', 'AdminAdminsController@edit')->name('admins-list.edit');
    Route::post('admin/admins-list/update/{id}', 'AdminAdminsController@update')->name('admins-list.update');

    Route::get('admin/designers-list/create', 'AdminDesignersController@create')->name('designers-list.create');
    Route::post('admin/designers-list/save', 'AdminDesignersController@save')->name('designers-list.save');
    Route::get('admin/designers-list', 'AdminDesignersController@getList')->name('designers-list');
    Route::get('admin/designers-list/edit/{id}', 'AdminDesignersController@edit')->name('designers-list.edit');
    Route::post('admin/designers-list/update/{id}', 'AdminDesignersController@update')->name('designers-list.update');

    Route::get('admin/users-list/create', 'AdminUsersController@create')->name('users-list.create');
    Route::post('admin/users-list/save', 'AdminUsersController@save')->name('users-list.save');
    Route::get('admin/users-list', 'AdminUsersController@getList')->name('users-list');
    Route::get('admin/users-list/edit/{id}', 'AdminUsersController@edit')->name('users-list.edit');
    Route::post('admin/users-list/update/{id}', 'AdminUsersController@update')->name('users-list.update');

    Route::get('admin/profile/edit', 'AdminAdminsController@editMyProfile')->name('profile.edit');
    Route::post('admin/profile/update', 'AdminAdminsController@updateMyProfile')->name('profile.update');
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
    Route::get('designer/dashboard', 'DesignerDashboardController@getDashboard')->name('dashboard');
});