<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\Pesantren;
use App\Provinsi;

use App\User;

class FrontendController extends Controller
{
    public function index(){
        $artikel = Artikel::take(3)->get();
        $kategori = Kategori::take(10)->get();
        $artikel = Pesantren::take(3)->get();
        $kategori = Provinsi::take(10)->get();
        return view('welcome', compact('artikel','kategori','pesantren','provinsi'));
    }

    public function blog(Kategori $kategori){
        $artikel=$kategori->artikel()->latest()->paginate(8);
        $kategori = Kategori::take(10)->get();
        $data = Artikel::inRandomOrder()->take(1)->get();
        $pesantren=$provinsi->pesantren()->latest()->paginate(8);
        $provinsi = Provinsi::take(10)->get();
        $data = Pesantren::inRandomOrder()->take(1)->get();
        return view('blog',compact('artikel','kategori','data','pesantren','provinsi'));
    }

    public function singleblog($artikel){
        $artikel = Artikel::with('user', 'kategori','tag')->where('slug', '=', $artikel)->first();
        $kategori = Kategori::take(10)->get();
        $data = Kontak::inRandomOrder()->take(1)->get();
        return view('singleblog',compact('artikel','kategori','kontak'));
    }
}
