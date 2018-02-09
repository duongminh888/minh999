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


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'LoginController@login')->name('login');
Route::post('plogin',['as'=>'plogin','uses'=>'LoginController@plogin']);
Route::get('/logout', function(){ Auth::logout(); return view('login'); })->name('logout');
Route::get('/', 'MyController@index')->name('index');
Route::get('chart', 'MyController@chart')->name('chart');
Route::get('demomember', 'MyController@demomember')->name('demomember');

Route::post('vaymoicheck',['as'=>'vaymoicheck','uses'=>'MemberController@vaymoicheck']);
Route::post('vaylaicheck',['as'=>'vaylaicheck','uses'=>'MemberController@vaylaicheck']);
Route::post('ploginmemsdt',['as'=>'ploginmemsdt','uses'=>'MemberController@ploginmemsdt']);
Route::post('uploadpassmember',['as'=>'uploadpassmember','uses'=>'MemberController@uploadpassmember']);

Route::get('loginmember', 'MemberController@loginmember')->name('loginmember');
// Route::get('loginmember2', 'MemberController@loginmember2')->name('loginmember2');
