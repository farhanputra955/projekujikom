<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail; 
use App\Artikel;
use App\Kategori;
use App\Pesantren;  
use App\Provinsi;
use App\Gallery;
use App\Tokoh;
use App\Berdoa;
use App\Doa;
use App\DoaHarian;
use App\Kerajaan;
use App\WaliSongo;
use App\SendEmail;
use App\Mail\SendMail;
use DB;

use App\User;

class FrontendController extends Controller
{
    public function index(){
        $artikel = Artikel::take(2)->get();
        $kategori = Kategori::take(10)->get();
        $provinsi = Provinsi::take(10)->get();
        $gallery = Gallery::take(10)->get();
        $pesantren = Pesantren::take(3)->get();
        $berdoa = Berdoa::take(3)->get();
        $doa = Doa::take(10)->get();
        $doaharian = DoaHarian::take(10)->get();
        $tokoh = Tokoh::take(9)->get();
        $kerajaan = Kerajaan::take(3)->get();
        $walisongo = walisongo::take(9)->get();
        return view('welcome', compact('artikel','kategori','pesantren','provinsi','gallery','pesantren','berdoa','doa','doaharian','tokoh','kerajaan','walisongo'));
    }


    public function blog(Kategori $kategori){
        $artikel=$kategori->artikel()->latest()->paginate(8);
        $kategori = Kategori::take(10)->get();
        $data = Artikel::inRandomOrder()->take(1)->get();
        return view('blog',compact('artikel','kategori','data'));
    }

    public function singleblog($artikel){
        $artikel = Artikel::where('slug', '=', $artikel)->first();
        $kategori = Kategori::take(10)->get();  
        $doaharian =  DoaHarian::take(10)->get();  
        $provinsi = Provinsi::take(10)->get();
        return view('singleblog',compact('artikel','kategori','provinsi','doaharian'));
    }

    public function kategori(kategori $kategori){
        $artikel=$kategori->artikel()->latest()->paginate(8);
        $judul=$kategori->artikel()->take(1)->get();
        $provinsi = Provinsi::take(10)->get();
        foreach($judul as $data){
           $oke = $data->id_kategori;
        }
        $judulkate = \DB::select('select * from kategoris where id= '.$oke.'');
        $kategori = kategori::take(10)->get();
        $doaharian = doaharian::take(19)->get();
        $data = artikel::inRandomOrder()->take(1)->get();
        return view('kategori',compact('artikel','kategori','data','judulkate','berdoa','doaharian','provinsi'));
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
        $doaharian = doaharian::take(19)->get();
        $data = Pesantren::inRandomOrder()->take(1)->get();
        return view('provinsi',compact('pesantren','provinsi','data','judulprov','berdoa','doaharian'));
    }
  
    public function doaharian($doaharian){
        $doaharian = DoaHarian::with('user')->where('slug', '=', $doaharian)->first();
        $doaharian2 =  DoaHarian::with('user')->get();
        $provinsi = provinsi::take(10)->get();
        $tokoh = tokoh::take(10)->get();
        return view('doaharian',compact('doaharian','provinsi','doaharian2','tokoh'));
    }


    public function kerajaan(Kerajaan $kerajaan){
        $kerajaan= kerajaan::take(7)->get();
        $provinsi = provinsi::take(10)->get();
        $tokoh = tokoh::take(10)->get();
        $doaharian = doaharian::take(19)->get();
        return view('kerajaan',compact('kerajaan','provinsi','tokoh','doaharian'));
    }


    public function kerajaanislam($kerajaan){
        $kerajaan = kerajaan::where('slug', '=', $kerajaan)->first();
        $provinsi = provinsi::take(10)->get();
        $walisongo = walisongo::take(10)->get();
        $doaharian = doaharian::take(19)->get();
        return view('kerajaanislam',compact('kerajaan','provinsi','doaharian','walisongo'));
    }


    public function pondok($pesantren){
        $pesantren = Pesantren::with('user', 'provinsi')->where('slug', '=', $pesantren)->first();
        $provinsi = provinsi::take(10)->get();
        $doaharian = doaharian::take(19)->get();
        return view('pondok',compact('pesantren','provinsi','doaharian'));
    }

    public function foto(Foto $foto){
        $foto= Foto::take(3)->get();
        $provinsi = Provinsi::take(10)->get();
        $berdoa = Berdoa::take(3)->get();
        return view('foto', compact('foto','provinsi','berdoa'));
    }

    public function gallery(gallery $gallery){
        $gallery= gallery::take(9)->get();
        $provinsi = Provinsi::take(10)->get();
        $doaharian = doaharian::take(3)->get();
        return view('gallery', compact('gallery','provinsi','doaharian'));
    }

    public function detail($gallery){
        $gallery = gallery::where('slug', '=', $gallery)->first();
        $provinsi = provinsi::take(10)->get();
        $berdoa = Berdoa::take(3)->get();
        $doaharian = DoaHarian::take(19)->get();
        return view('detail',compact('gallery','provinsi','berdoa','doaharian'));
    }


    public function berdoa(){
        $berdoa = Berdoa::take(3)->get();
        $provinsi = Provinsi::take(10)->get();
        return view('berdoa',compact('berdoa','provinsi'));
    }

        public function tokoh($tokoh){
            $tokoh = tokoh::where('slug', '=', $tokoh)->first();
            $provinsi = provinsi::take(10)->get();
            $doaharian = DoaHarian::take(10)->get();
            return view('tokoh',compact('tokoh','provinsi','doaharian'));
        }

        public function walisongo($walisongo){
            $walisongo = walisongo::where('slug', '=', $walisongo)->first();
            $provinsi = provinsi::take(10)->get();
            $doaharian = DoaHarian::take(10)->get();
            return view('walisongo',compact('walisongo','provinsi','doaharian'));
        }


        public function email()
        {
            $provinsi = provinsi::take(10)->get();
            $doaharian = doaharian::take(10)->get();
            return view('kontak', compact('provinsi','doaharian'));
        }

        function send(Request $request)
        {
            $this->validate($request, [
                'name'  =>  'required',
                'email' =>  'required|email',
                'message'   =>  'required'
            ]);

           $data = array(
               'name'   =>  $request->name,
               'message'    =>  $request->message,
           );

           Mail::to('farhanhidayatulfattah@gmail.com')->send(new SendMail($data));

           return back()->with('success', 'thank you!');
        }
    } 

