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



/*   *****************************
        AdminLoginController
     *****************************
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/register','Auth\AdminLoginController@showAdminRegisterForm')->name('admin.register');
    Route::post('/register','Auth\AdminLoginController@createAdmin')->name('admin.register.submit');

    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout','Auth\LoginController@logout');
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

    Route::get('/', 'WritterController@index')->name('writter.dashboard');
});
