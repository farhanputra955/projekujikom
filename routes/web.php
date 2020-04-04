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
    Route::get('/kisah/{kisah}', 'FrontendController@kisah');
    Route::get('/doaseharihari/{doaseharihari}', 'FrontendController@doaseharihari');
    Route::get('/doa/{doa}', 'FrontendController@doa');   
    Route::get('/blog/{blog}', 'FrontendController@blog');   
    route::get('/singleblog/{artikel}', 'FrontendController@singleblog');
    route::get('/pondok/{pesantren}', 'FrontendController@pondok');
    route::get('/detail/{foto}', 'FrontendController@detail');
    Route::get('/foto', 'FrontendController@foto');
    Route::get('/gallery', 'FrontendController@gallery');
    Route::get('/contact', 'FrontendController@contact');
    Route::get('/doaharian/{doaharian}', 'FrontendController@doaharian'); 
    Route::get('/tokoh/{tokoh}', 'FrontendController@tokoh');
    Route::get('/kerajaan', 'FrontendController@kerajaan');  
    route::get('/kerajaanislam/{kerajaan}', 'FrontendController@kerajaanislam');
    route::get('/detailkisah/{nabi}', 'FrontendController@detailkisah');
    route::get('/walisongo/{walisongo}', 'FrontendController@walisongo');
    Route::get('/email','FrontendController@email');
    Route::get('/kategori/{kategori}', 'FrontendController@kategori');  
    Route::get('/kontak','FrontendController@kontak');
    Route::get('beritalainnya','FrontendController@beritalainnya');
    Route::get('/myprofile', 'FrontendController@myprofile');  
    Route::get('/profil', 'FrontendController@profil');  
    Route::post('/sendemail/send','FrontendController@send');
    Route::get('/select2',function(){
        $lastNames = App\Nabi::pluck('kisah','id')->toArray();
        return view('select2',compact('kisahs'));
    });
   
    
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    
       
        Route::resource('pesantren', 'PesantrenController');
        Route::resource('kerajaan', 'KerajaanController');
        Route::resource('walisongo', 'WalisongoController');
        Route::resource('tokoh', 'TokohController');
        Route::resource('berdoa', 'BerdoaController');
        Route::resource('foto', 'FotoController');
        Route::resource('provinsi', 'ProvinsiController');      
       Route::resource('kategori', 'KategoriController');
       Route::resource('artikel', 'ArtikelController');
       Route::resource('gallery', 'GalleryController');
       Route::resource('doa', 'DoaController');
       Route::resource('doaseharihari', 'DoaseharihariController'); 
       Route::resource('more', 'MoreController');
       Route::resource('doaharian', 'DoaHarianController');
       Route::resource('kisah', 'KisahController'); 
       Route::resource('nabi', 'NabiController');
       Route::resource('book', 'BookController');
       Route::resource('category', 'CategoryController');
      
});

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');