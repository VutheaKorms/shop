<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['web']],function() {
//    Route::put('user/{id}','UsersController@update');
//    Route::get('user/{id}/edit','UsersController@edit');
//});



Route::group(['middleware' => ['auth']], function () {
//    Route::resource('users','UsersController');
    Route::get('users','UsersController@index');
    Route::put('user/disable/{id}','UsersController@disable');
    Route::put('user/enable/{id}','UsersController@enable');
//    Route::get('picture/{id}','UsersController@showPicture');
    Route::delete('picture/delete/{id}','UsersController@deletePic');
    Route::get('/test','UsersController@userLogIn');
    Route::put('user/{id}','UsersController@update');
    Route::get('user/{id}/edit','UsersController@edit');
    Route::post('users/testUpload','UsersController@resizeImagePost');

//    Route::get('/test', function() {
//        return Auth::user();
//    });

});

//Route::resource('brands','BrandsController');
Route::get('brands','BrandsController@index');
Route::post('brands/post','BrandsController@store');
Route::get('brands/edit/{id}','BrandsController@edit');
Route::get('brands/{id}','BrandsController@show');
Route::delete('brands/{id}','BrandsController@destroy');
Route::put('brands/{brand}','BrandsController@update');
Route::put('brands/disable/{id}','BrandsController@disable');
Route::put('brands/enable/{id}','BrandsController@enable');
Route::get('brands/status/{status}','BrandsController@getAllActive');

//Route::resource('categories','CategoriesController');
Route::get('categories','CategoriesController@index');
Route::get('categories/edit/{id}','CategoriesController@edit');
Route::get('categories/{id}','CategoriesController@show');
Route::post('categories/post','CategoriesController@store');
Route::put('categories/{category}','CategoriesController@update');
Route::delete('categories/{id}','CategoriesController@destroy');
Route::put('categories/disable/{id}','CategoriesController@disable');
Route::put('categories/enable/{id}','CategoriesController@enable');
Route::get('categories/status/{status}','CategoriesController@getAllActive');
Route::get('categories/status/{status}/brand/{brand}','CategoriesController@getCateByBrand');

Route::group(['middleware' => ['web']], function () {
    Route::get('products/account/{id}','ProductsController@index');
    Route::get('products/{id}','ProductsController@show');
    Route::get('products/{id}/edit','ProductsController@edit');
    Route::post('products','ProductsController@store');
    Route::put('products/{id}','ProductsController@update');
    Route::delete('products/{id}','ProductsController@destroy');
//    Route::resource('products','ProductsController');
    Route::put('products/disable/{id}','ProductsController@disable');
});

Route::post('test/upload','ProductsController@upload');
Route::post('test/editUpload','ProductsController@editUpload');
Route::get('product/review/{id}','ProductsController@showPhoto');
Route::get('product','ItemController@index');
Route::delete('photo/delete/{id}','ProductsController@destroyPhoto');
Route::get('photo/{id}','ProductsController@editPhoto');
Route::post('cover/upload','UploadController@upload');
Route::get('cover','UploadController@index');
Route::delete('cover/{id}','UploadController@destroyPhoto');
Route::get('cover/{id}','UploadController@editPhoto');
Route::get('productByCate/{cateId}','CategoriesController@getProductByCate');
Route::get('productByCategory/{id}','ItemController@getProByCategory');

Route::put('contacts/disable/{id}','ContactsController@disable');
Route::post('contacts','ContactsController@store');
Route::delete('contacts/{id}','ContactsController@destroy');
Route::put('contacts/update/{id}','ContactsController@update');
Route::get('contacts/account/{id}','ContactsController@index');
Route::get('contacts/id/{id}/account/{acc}/edit','ContactsController@edit');
Route::get('contacts/id/{id}/account/{acc}','ContactsController@show');
Route::get('contacts/status/{status}/acc/{acc}','ContactsController@getAllActive');
Route::get('countries/status/{status}','AddressesController@getAllCountryActive');
Route::get('states/status/{status}','AddressesController@getAllStateActive');
Route::get('locations/status/{status}','AddressesController@getAllLocationActive');
Route::get('states/status/{status}/country/{country}','AddressesController@getStateByCountry');





