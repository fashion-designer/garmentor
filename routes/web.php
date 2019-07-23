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

Route::group(['middleware' => 'guest'], function()
{
    Route::get('/', 'WelcomeController@welcome');
});

Auth::routes();

Route::group(['namespace' => 'Auth', 'as' => 'auth.', 'middleware' => 'guest'], function()
{
    Route::get('admin/register', 'AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('admin/register-post', 'AdminRegisterController@register')->name('admin.register-post');
    Route::get('admin/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login-post', 'AdminLoginController@login')->name('admin.login-post');
});

Route::group(['namespace' => 'Auth', 'middleware' => 'admin'], function()
{
    Route::post('admin/logout', 'AdminLoginController@logout')->name('admin.logout');
});

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'admin'], function()
{
    Route::get('admin/dashboard', 'AdminDashboardController@getDashboard')->name('admin.dashboard');
});

Route::group(['namespace' => 'User', 'as' => 'user.', 'middleware' => 'auth'], function()
{
    Route::get('user/dashboard', 'UserDashboardController@getDashboard')->name('user.dashboard');
});