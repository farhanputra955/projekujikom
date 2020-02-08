<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\Pesantren;
use App\Provinsi;
use App\Gallery;
use DB;

use App\User;

class FrontendController extends Controller
{
    public function index(){
        $artikel = Artikel::take(3)->get();
        $kategori = Kategori::take(10)->get();
        $artikel = Pesantren::take(3)->get();
        $provinsi = Provinsi::take(10)->get();
        return view('welcome', compact('artikel','kategori','pesantren','provinsi'));
    }

    public function blog(Kategori $kategori){
        $artikel=$kategori->artikel()->latest()->paginate(8);
        $kategori = Kategori::take(10)->get();
        $data = Artikel::inRandomOrder()->take(1)->get();
        return view('blog',compact('artikel','kategori','data'));
    }

    public function provinsi(Provinsi $provinsi){
        $pesantren=$provinsi->pesantren()->latest()->paginate(8);
        $judul=$provinsi->pesantren()->take(1)->get();
        foreach($judul as $data){
           $oke = $data->id_provinsi;
        }
        $judulprov = \DB::select('select * from provinsis where id= '.$oke.'');
        $provinsi = Provinsi::take(10)->get();
        $data = Pesantren::inRandomOrder()->take(1)->get();
        return view('provinsi',compact('pesantren','provinsi','data','judulprov'));
    }

    public function singleblog($pesantren){
        $pesantren = Pesantren::with('user', 'provinsi')->where('slug', '=', $pesantren)->first();
        $provinsi = provinsi::take(10)->get();
        return view('singleblog',compact('pesantren','provinsi'));
    }

    public function gallery(Gallery $gallery){
        $gallery= Gallery::take(3)->get();
        $provinsi = Provinsi::take(10)->get();
        return view('gallery', compact('gallery','provinsi'));
    }

  
}
