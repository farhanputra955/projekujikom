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
   
  
    Route::get('/provinsi/{provinsi}', 'FrontendController@provinsi');   
    Route::get('/blog/{blog}', 'FrontendController@blog');   
    route::get('/singleblog/{pesantren}', 'FrontendController@singleblog');
    Route::get('/gallery', 'FrontendController@gallery');   
    
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    
       
        Route::resource('pesantren', 'PesantrenController');
        Route::resource('provinsi', 'ProvinsiController');      
       Route::resource('kategori', 'KategoriController');
       Route::resource('artikel', 'ArtikelController');
       Route::resource('gallery', 'GalleryController');
});

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');