<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/start', function () {
    return view('start');
});


//registration
Route::post('/registration','userController@regview');
Route::post('/register-login-data','userController@reguser');
Route::post('/create-profile','userController@createpro');



//login authentication
Route::post('/authentication','userController@auth');
Route::get('/logout','userController@logout');



//admin routes
Route::get('/admin/dashboard', 'dashController@view')->middleware('admin_check');
Route::get('/admin/add-province', 'provinceConroller@view')->middleware('admin_check');
Route::get('/admin/edit-province', 'provinceConroller@viewedit')->middleware('admin_check');
Route::get('/admin/add-district', 'districtController@view')->middleware('admin_check');
Route::get('/admin/edit-district', 'districtController@viewedit')->middleware('admin_check');
Route::get('/admin/add-cities', 'cityController@view')->middleware('admin_check');
Route::get('/admin/edit-cities', 'cityController@viewedit')->middleware('admin_check');
Route::get('/admin/add-companies','companyController@view')->middleware('admin_check');
Route::get('/admin/add-products','productController@view')->middleware('admin_check');
Route::get('/admin/edit-product-category','productController@viewedit')->middleware('admin_check');
Route::get('/admin/view-orders','orderController@view')->middleware('admin_check');

Route::post('/create-province','provinceConroller@create');
Route::post('/edit-province-data','provinceConroller@edit');
Route::post('/create-district','districtController@create');
Route::post('/edit-district-data','districtController@edit');
Route::post('/create-city','cityController@create');
Route::post('/create-company','companyController@create');
Route::post('/edit-city','cityController@edit');
Route::post('/delete-city','cityController@delete');
Route::post('/create-product','productController@create');
Route::post('/edit-product-category','productController@edit');
Route::post('/delete-product-categoey','productController@delete');
Route::post('/search-clients','clientController@search');
Route::get('/mark_order_as_delivered/{id}','orderController@mark');



//Company routes 
Route::get('/company/dashboard', 'Company\dashController@view')->middleware('company_check');
Route::get('/company/add-products', 'Company\productController@view')->middleware('company_check');
Route::get('/company/add-emails', 'Company\emailController@view')->middleware('company_check');
Route::get('/company/view-orders', 'Company\orderController@view')->middleware('company_check');

Route::post('/create-pharma-product', 'Company\productController@create');
Route::post('/delete-pharma-product', 'Company\productController@delete');
Route::post('/create-email', 'Company\emailController@create');
Route::post('/delete-email', 'Company\emailController@delete');
Route::post('/uploadFile', 'Company\productController@upload');



//Chemist routs
Route::get('/chemist/dashboard', 'Chemist\dashController@view')->middleware('chemist_check');
Route::get('/chemist/place-order', 'Chemist\orderController@view')->middleware('chemist_check');

Route::post('/place-order-action', 'Chemist\orderController@create');

Route::get('/export_excel/{id}', 'ExportExcelController@view');
Route::get('/export_excel/download/{id}', 'ExportExcelController@excel');
Route::get('/download-sample', 'ExportExcelController@samplecsv');



//api routs
Route::get('/get-district/{id}','districtController@get'); ///api routs
Route::get('/get-cities/{id}','cityController@get'); ///api routs
Route::get('/get-price/{id}','Company\productController@get'); ///api routs
Route::get('/get-products','Company\productController@getProduct'); ///api routs
Route::get('/get-product-category','Chemist\orderController@getCategory'); ///api routs
Route::get('/get-province','provinceConroller@get'); ///api routs
Route::get('/get-clients/{id}','clientController@get');
Route::get('/get-companytwo/{id}','companyController@gettwo');
