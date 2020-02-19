<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\Pesantren;
use App\Provinsi;
use App\Gallery;
use App\Berdoa;
use App\Doa;
use App\DoaHarian;
use DB;

use App\User;

class FrontendController extends Controller
{
    public function index(){
        $artikel = Artikel::take(3)->get();
        $kategori = Kategori::take(10)->get();
        $artikel = Pesantren::take(3)->get();
        $provinsi = Provinsi::take(10)->get();
        $gallery = Gallery::take(10)->get();
        $pesantren = Pesantren::take(3)->get();
        $berdoa = Berdoa::take(3)->get();
        $doa = Doa::take(10)->get();
        $doaharian = DoaHarian::take(10)->get();
        return view('welcome', compact('artikel','kategori','pesantren','provinsi','gallery','pesantren','berdoa','doa','doaharian'));
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
        $berdoa = Berdoa::take(3)->get();
        $data = Pesantren::inRandomOrder()->take(1)->get();
        return view('provinsi',compact('pesantren','provinsi','data','judulprov','berdoa'));
    }
  
    public function doaharian($doaharian){
        $doaharian = DoaHarian::with('user')->where('slug', '=', $doaharian)->first();
        $doaharian2 =  DoaHarian::with('user')->get();
        $provinsi = provinsi::take(10)->get();
        return view('doaharian',compact('doaharian','provinsi','doaharian2'));
    }
  


    public function singleblog($artikel){
        $artikel = Artikel::with('user', 'provinsi')->where('slug', '=', $artikel)->first();
        $kategori = Kategori::take(10)->get();       
        return view('singleblog',compact('artikel','kategori'));
    }

    public function pondok($pesantren){
        $pesantren = Pesantren::with('user', 'provinsi')->where('slug', '=', $pesantren)->first();
        $provinsi = provinsi::take(10)->get();
        $berdoa = Berdoa::take(3)->get();
        return view('pondok',compact('pesantren','provinsi','berdoa'));
    }

    public function foto(Foto $foto){
        $foto= Foto::take(3)->get();
        $provinsi = Provinsi::take(10)->get();
        $berdoa = Berdoa::take(3)->get();
        return view('foto', compact('foto','provinsi','berdoa'));
    }

    public function gallery(gallery $gallery){
        $gallery= gallery::take(3)->get();
        $provinsi = Provinsi::take(10)->get();
        $berdoa = Berdoa::take(3)->get();
        return view('gallery', compact('gallery','provinsi','berdoa'));
    }

    public function detail($gallery){
        $gallery = gallery::where('slug', '=', $gallery)->first();
        $provinsi = provinsi::take(10)->get();
        $berdoa = Berdoa::take(3)->get();
        return view('detail',compact('gallery','provinsi','berdoa'));
    }
   
    public function kontak(){
        $provinsi = Provinsi::take(10)->get();
        $berdoa = Berdoa::take(3)->get();
        return view('kontak', compact('provinsi','berdoa'));
    }


    public function berdoa(){
        $berdoa = Berdoa::take(3)->get();
        $provinsi = Provinsi::take(10)->get();
        return view('berdoa',compact('berdoa','provinsi'));
    }
  
}
