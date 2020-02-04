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

    Route::get('/', 'FrontendController@index');
    
    Route::get('/contact', function () {
        return view('contact'); 
    });
    Route::get('/single', function () {
        return view('singleblog'); 
    });
    Route::get('/blog/{kategori}', 'FrontendController@blog');
    route::get('singleblog/{artikel}', 'FrontendController@singleblog');

Auth::routes();

Route::group(['prefix' => 'backend', 'middleware' => ['auth', 'role:Admin']], function () {
    
       
        Route::resource('pesantren', 'PesantrenController');
        Route::resource('provinsi', 'ProvinsiController');      
       Route::resource('kategori', 'KategoriController');
       Route::resource('artikel', 'ArtikelController');
       Route::resource('kontak', 'KontakController');

});
        Route::resource('pesantren', 'PesantrenController');
        Route::resource('provinsi', 'ProvinsiController'); 
        Route::resource('kategori', 'KategoriController');
        Route::resource('artikel', 'ArtikelController');
        Route::resource('kontak', 'KontakController');

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');