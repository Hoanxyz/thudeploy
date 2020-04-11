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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioithieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('gio-hang',[
	'as'=>'giohang',
	'uses'=>'PageController@getCart'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);


/////////////////////////////////////////admin

Route::get('admin/dangnhap', 'UserController@getDangnhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangnhapAdmin');

Route::get('admin/dangxuat', 'UserController@getDangxuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){

	Route::group(['prefix'=>'loaisp'], function(){

		Route::get('danhsach', 'LoaiSpController@getDanhsach');

		Route::get('sua/{id}', 'LoaiSpController@getSua');
		Route::post('sua/{id}', 'LoaiSpController@postSua');

		Route::get('them', 'LoaiSpController@getThem');
		Route::post('them', 'LoaiSpController@postThem');

		Route::get('xoa/{id}', 'LoaiSpController@getXoa');
	});

	Route::group(['prefix'=>'sanpham'], function(){

		Route::get('danhsach', 'SanPhamController@getDanhsach');
		Route::get('danhsachhet', 'SanPhamController@getDanhsachhet');
		Route::get('danhsachngungban', 'SanPhamController@getDanhsachngungban');

		Route::get('sua/{id}', 'SanPhamController@getSua');
		Route::post('sua/{id}', 'SanPhamController@postSua');

		Route::get('them', 'SanPhamController@getThem');
		Route::post('them', 'SanPhamController@postThem');

		Route::get('xoa/{id}', 'SanPhamController@getXoa');
	});

	Route::group(['prefix'=>'slide'], function(){

		Route::get('danhsach', 'SlideController@getDanhsach');

		Route::get('sua/{id}', 'SlideController@getSua');
		Route::post('sua/{id}', 'SlideController@postSua');

		Route::get('them', 'SlideController@getThem');
		Route::post('them', 'SlideController@postThem');

		Route::get('xoa/{id}', 'SlideController@getXoa');
	});

	Route::group(['prefix'=>'user'], function(){

		Route::get('danhsach', 'UserController@getDanhsach');

		Route::get('taikhoankhach', 'UserController@getTaikhoankhach');

		Route::get('sua/{id}', 'UserController@getSua');
		Route::post('sua/{id}', 'UserController@postSua');

		Route::get('them', 'UserController@getThem');
		Route::post('them', 'UserController@postThem');

		Route::get('xoa/{id}', 'UserController@getXoa');
	});

	Route::group(['prefix'=>'hoadon'], function(){

		Route::get('danhsach', 'BillController@getDanhsach');

		Route::get('chitiethoadon/{id}', 'BillController@getChitiet');	

		Route::get('danhsachchitiethoadon', 'BillController@getDanhsachchitiet');
		Route::get('xoachitiet/{id}', 'BillController@getXoachitiet');

		Route::get('danhsachkhach', 'BillController@getDanhsachkhach');
		Route::get('xoakhach/{id}', 'BillController@getXoakhach');

		Route::get('sua/{id}', 'BillController@getSua');
		Route::post('sua/{id}', 'BillController@postSua');

		Route::get('xoa/{id}', 'BillController@getXoa');
	});

	Route::group(['prefix'=>'nhanvien'], function(){

		Route::get('danhsach', 'EmployeeController@getDanhsach');

		Route::get('sua/{id}', 'EmployeeController@getSua');
		Route::post('sua/{id}', 'EmplloyeeController@postSua');

		Route::get('them', 'EmployeeController@getThem');
		Route::post('them', 'EmployeeController@postThem');

		Route::get('xoa/{id}', 'EmployeeController@getXoa');
	});
});
