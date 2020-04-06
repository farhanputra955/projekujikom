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
use App\Doa;
use App\Doaseharihari;
use App\More;
use App\DoaHarian;
use App\Kerajaan;
use App\WaliSongo;
use App\SendEmail;
use App\Mail\SendMail;
use App\Kisah;
use App\DetailKisah;
use App\Nabi;
use App\Myprofile;
use DB;

use App\User;

class FrontendController extends Controller
{
    public function index(){
        $artikel = Artikel::take(2)->get();
        $kategori = Kategori::take(10)->get();
        $kisah = kisah::take(10)->get();
        $provinsi = Provinsi::take(10)->get();
        $gallery = Gallery::take(10)->get();
        $pesantren = Pesantren::take(3)->get();
        $doa = Doa::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $doaharian = doaharian::take(10)->get();
        $tokoh = Tokoh::take(9)->get();
        $kerajaan = Kerajaan::take(3)->get();
        $kisah = kisah::take(8)->get();
        $walisongo = walisongo::take(9)->get();
        return view('index', compact('artikel','kisah','kategori','pesantren','provinsi','gallery','pesantren','doaseharihari','tokoh','kerajaan','walisongo','kisah','doaseharihari','more'));
    }


    public function singleblog($artikel){
        $artikel = Artikel::where('slug', '=', $artikel)->first();
        $kategori = Kategori::take(10)->get();  
        $doaharian =  DoaHarian::take(10)->get();  
        $provinsi = Provinsi::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $kisah = kisah::take(10)->get();
        return view('singleblog',compact('artikel','kategori','provinsi','doaseharihari','more','kisah'));
    }

    public function kategori(kategori $kategori){
        $artikel=$kategori->artikel()->latest()->paginate(8);
        $judul=$kategori->artikel()->take(1)->get();
        $provinsi = Provinsi::take(10)->get();
        $kisah = kisah::take(10)->get();
        foreach($judul as $data){
           $oke = $data->id_kategori;
        }
        $judulkate = \DB::select('select * from kategoris where id= '.$oke.'');
        $kategori = kategori::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $data = artikel::inRandomOrder()->take(1)->get();
        return view('kategori',compact('artikel','kategori','data','judulkate','provinsi','doaseharihari','more','kisah'));
    }


    public function beritalainnya(){
        $artikel = Artikel::take(10)->get();
        $provinsi = Provinsi::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $kerajaan = kerajaan::take(10)->get();
        $gallery = gallery::take(10)->get();
        $kisah = kisah::take(10)->get();

        return view('beritalainnya', compact('artikel','provinsi','doaseharihari','more','kerajaan','gallery','kisah'));
    }
    
    public function provinsi(Provinsi $provinsi){
        $pesantren=$provinsi->pesantren()->latest()->paginate(8);
        $judul=$provinsi->pesantren()->take(1)->get();
        foreach($judul as $data){
           $oke = $data->id_provinsi;
        }
        $judulprov = \DB::select('select * from provinsis where id= '.$oke.'');
        $provinsi = Provinsi::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $data = Pesantren::inRandomOrder()->take(1)->get();
        $kisah = kisah::take(10)->get();
        return view('provinsi',compact('pesantren','provinsi','data','judulprov','doaseharihari','kisah','more'));
    }


    public function doa(Doa $doa){
        $doaharian=$doa->doaharian()->latest()->paginate(8);
        $judul=$doa->doaharian()->take(1)->get();
        foreach($judul as $data){
           $oke = $data->id_doa;
        }
        $juduldoa = \DB::select('select * from doas where id= '.$oke.'');
       
        $provinsi = provinsi::take(10)->get();
        $tokoh = tokoh::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $data = doaharian::inRandomOrder()->take(1)->get();
        $kisah = kisah::take(10)->get();
        return view('doa',compact('doaharian','doaseharihari','data','juduldoa','provinsi','doaseharihari','more','kisah','tokoh'));
    }
  

    public function kisah(kisah $kisah){
        $nabi=$kisah->nabi()->latest()->paginate(8);
        $judul=$kisah->nabi()->take(1)->get();
        foreach($judul as $data){
           $oke = $data->id_kisah;
        }
        $judulkisah = \DB::select('select * from kisahs where id= '.$oke.'');
        $kisah = kisah::take(10)->get();
        $provinsi = provinsi::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $data = nabi::inRandomOrder()->take(1)->get();
        return view('kisah',compact('nabi','kisah','data','judulkisah','provinsi','doaseharihari','more'));
    }

    public function doaseharihari(doaseharihari $doaseharihari){
        $more=$doaseharihari->more()->latest()->paginate(8);
        $judul=$doaseharihari->more()->take(1)->get();
        foreach($judul as $data){
           $oke = $data->id_doaseharihari;
        }
        $juduldoaseharihari = \DB::select('select * from doasehariharis where id= '.$oke.'');
        $doaseharihari = doaseharihari::take(10)->get();
        $provinsi = provinsi::take(10)->get();
        $tokoh = tokoh::take(10)->get();
        $kisah = kisah::take(10)->get();
        $data = more::inRandomOrder()->take(1)->get();
        return view('doaseharihari',compact('more','kisah','data','juduldoaseharihari','provinsi','doaseharihari','more','kisah','tokoh'));
    }
    

    public function detailkisah($nabi){
        $nabi = nabi::with('user', 'kisah')->where('slug', '=', $nabi)->first();
        $provinsi = provinsi::take(10)->get();
        $kisah = kisah::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        return view('detailkisah',compact('nabi','provinsi','doaseharihari','more','kisah'));
    }


    public function kerajaan(Kerajaan $kerajaan){
        $kerajaan= kerajaan::take(7)->get();
        $provinsi = provinsi::take(10)->get();
        $tokoh = tokoh::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $kisah = kisah::take(10)->get();
        return view('kerajaan',compact('kerajaan','provinsi','tokoh','kisah','doaseharihari','more'));
    }


    public function kerajaanislam($kerajaan){
        $kerajaan = kerajaan::where('slug', '=', $kerajaan)->first();
        $provinsi = provinsi::take(10)->get();
        $walisongo = walisongo::take(10)->get();
        $kisah = kisah::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        return view('kerajaanislam',compact('kerajaan','provinsi','walisongo','kisah','doaseharihari','more'));
    }


    public function pondok($pesantren){
        $pesantren = Pesantren::with('user', 'provinsi')->where('slug', '=', $pesantren)->first();
        $provinsi = provinsi::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $kisah = kisah::take(19)->get();
        return view('pondok',compact('pesantren','provinsi','doaseharihari','kisah','more'));
    }

    public function gallery(gallery $gallery){
        $gallery= gallery::take(9)->get();
        $provinsi = Provinsi::take(10)->get();
        $kisah = kisah::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        return view('gallery', compact('gallery','provinsi','doaseharihari','kisah','more'));
    }

    public function detail($gallery){
        $gallery = gallery::where('slug', '=', $gallery)->first();
        $provinsi = provinsi::take(10)->get();
        $doaseharihari = Doaseharihari::take(10)->get();
        $more = More::take(10)->get();
        $kisah = kisah::take(10)->get();
        return view('detail',compact('gallery','provinsi','kisah','doaseharihari','more'));
    }

        public function tokoh($tokoh){
            $tokoh = tokoh::where('slug', '=', $tokoh)->first();
            $provinsi = provinsi::take(10)->get();
            $nabi = nabi::take(10)->get();
            $kisah = kisah::take(10)->get();
            $doaseharihari = Doaseharihari::take(10)->get();
            $more = More::take(10)->get();
            return view('tokoh',compact('tokoh','provinsi','doaseharihari','more','kisah','nabi'));
        }

        public function walisongo($walisongo){
            $walisongo = walisongo::where('slug', '=', $walisongo)->first();
            $provinsi = provinsi::take(10)->get();
            $kisah = kisah::take(10)->get();
            $doaseharihari = Doaseharihari::take(10)->get();
            $more = More::take(10)->get();
            $kerajaan = Kerajaan::take(10)->get();
            return view('walisongo',compact('walisongo','provinsi','doaseharihari','kisah','more','kerajaan'));
        }

        public function myprofile(){
          
            return view('myprofile');
        }

        public function profil(){
          
            return view('profil');
        }

        public function kontak()
        {
            $provinsi = provinsi::take(10)->get();
            $kisah = kisah::take(10)->get();
            $doaseharihari = Doaseharihari::take(10)->get();
            $more = More::take(10)->get();
            return view('kontak', compact('provinsi','doaseharihari','kisah','more'));
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

           return back()->with('success', 'Thank You ;)');
        }
    } 

    