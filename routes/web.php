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
    Route::get('/kontak', 'FrontendController@kontak');  
    Route::get('/provinsi/{provinsi}', 'FrontendController@provinsi');   
    Route::get('/blog/{blog}', 'FrontendController@blog');   
    route::get('/singleblog/{artikel}', 'FrontendController@singleblog');
    route::get('/pondok/{pesantren}', 'FrontendController@pondok');
    route::get('/detail/{foto}', 'FrontendController@detail');
    Route::get('/foto', 'FrontendController@foto');
    Route::get('/gallery', 'FrontendController@gallery');
    Route::get('/contact', 'FrontendController@contact');
    Route::get('/doaharian/{doaharian}', 'FrontendController@doaharian'); 
    Route::get('/berdoa/{berdoa}', 'FrontendController@berdoa');   
    
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    
       
        Route::resource('pesantren', 'PesantrenController');
        Route::resource('berdoa', 'BerdoaController');
        Route::resource('foto', 'FotoController');
        Route::resource('provinsi', 'ProvinsiController');      
       Route::resource('kategori', 'KategoriController');
       Route::resource('artikel', 'ArtikelController');
       Route::resource('gallery', 'GalleryController');
       Route::resource('doa', 'DoaController');
       Route::resource('doaharian', 'DoaHarianController');
});

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');