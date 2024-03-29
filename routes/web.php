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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*

User
*/
Route::get('/user/logout','Auth\LoginController@Userlogout')->name('user.logout');

/*   *****************************
        AdminLoginController
     *****************************
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/register','Auth\AdminLoginController@showAdminRegisterForm')->name('admin.register');
    Route::post('/register','Auth\AdminLoginController@createAdmin')->name('admin.register.submit');

    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');


  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

});


/*   *****************************
        WritterLoginController
     *****************************
*/

Route::group(['prefix' => 'writter'], function () {
    Route::get('/register','Auth\WritterLoginController@showWritterRegisterForm')->name('writter.register');
    Route::post('/register','Auth\WritterLoginController@createWritter')->name('writter.register.submit');

    Route::get('/login','Auth\WritterLoginController@showLoginForm')->name('writter.login');
    Route::post('/login','Auth\WritterLoginController@login')->name('writter.login.submit');

    Route::get('/logout','Auth\WritterLoginController@logout')->name('writter.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\WritterForgotPasswordController@sendResetLinkEmail')->name('writter.password.email');
  Route::get('/password/reset', 'Auth\WritterForgotPasswordController@showLinkRequestForm')->name('writter.password.request');
  Route::post('/password/reset', 'Auth\WritterResetPasswordController@reset')->name('writter.password.update');
  Route::get('/password/reset/{token}', 'Auth\WritterResetPasswordController@showResetForm')->name('writter.password.reset');


    Route::get('/', 'WritterController@index')->name('writter.dashboard');
});
