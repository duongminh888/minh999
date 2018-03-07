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
Route::get('mcontrol', 'MemberController@mcontrol')->name('mcontrol');
Route::get('donxinvay', 'MyController@donxinvay')->name('donxinvay');
Route::get('thanhvien', 'MyController@thanhvien')->name('thanhvien');
Route::get('hoadon/{id}', 'MyController@hoadon')->name('hoadon');
Route::post('edithoso',['as'=>'edithoso','uses'=>'MyController@edithoso']);
Route::post('editthongtin',['as'=>'editthongtin','uses'=>'MyController@editthongtin']);
Route::get('test', 'MyController@test')->name('');
Route::get('editmember/{id}', 'MyController@editmember')->name('editmember');
Route::post('posteditmember',['as'=>'posteditmember','uses'=>'MyController@posteditmember']);
Route::get('themthanhvien', 'MyController@themthanhvien')->name('themthanhvien');
Route::post('postthemthanhvien',['as'=>'postthemthanhvien','uses'=>'MyController@postthemthanhvien']);
Route::get('khachhang', 'MyController@khachhang')->name('khachhang');
Route::get('chitietkhachhang/{id}', 'MyController@chitietkhachhang')->name('chitietkhachhang');
Route::get('profile/{name}', 'MyController@profile')->name('profile');
Route::post('thayavatar',['as'=>'thayavatar','uses'=>'MyController@thayavatar']);
Route::post('thaythongtincanhan',['as'=>'thaythongtincanhan','uses'=>'MyController@thaythongtincanhan']);
Route::post('doimatkhau',['as'=>'doimatkhau','uses'=>'MyController@doimatkhau']);
Route::post('pustcomment',['as'=>'pustcomment','uses'=>'CommentController@pustcomment']);
Route::get('deletefile/{id}', 'MyController@deletefile')->name('deletefile');
Route::post('uploadfile',['as'=>'uploadfile','uses'=>'MyController@uploadfile']);
Route::get('phonggiaodich', 'MyController@phonggiaodich')->name('phonggiaodich');
Route::post('addpgd',['as'=>'addpgd','uses'=>'MyController@addpgd']);
Route::post('editpgd',['as'=>'editpgd','uses'=>'MyController@editpgd']);
Route::post('edittrangthai',['as'=>'edittrangthai','uses'=>'MyController@edittrangthai']);
Route::post('adduserpgd',['as'=>'adduserpgd','uses'=>'MyController@adduserpgd']);



Route::get('pgd/{id}', 'MyController@pgd')->name('pgd');
Route::get('xoaphong/{id}', 'MyController@xoaphong')->name('xoaphong');
Route::post('addnhanvien',['as'=>'addnhanvien','uses'=>'MyController@addnhanvien']);
//requet


//shop
Route::get('themdonvay', 'ShopController@themdonvay')->name('themdonvay');
Route::get('tatcadonvay', 'ShopController@tatcadonvay')->name('tatcadonvay');
Route::post('shopadddonvay',['as'=>'shopadddonvay','uses'=>'ShopController@shopadddonvay']);
Route::get('hoadonshop/{id}', 'ShopController@hoadonshop')->name('hoadonshop');
Route::post('editshophoso',['as'=>'editshophoso','uses'=>'ShopController@editshophoso']);
Route::post('editshopthongtin',['as'=>'editshopthongtin','uses'=>'ShopController@editshopthongtin']);
//shop
