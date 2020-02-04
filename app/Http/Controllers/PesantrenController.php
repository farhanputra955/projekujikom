<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Provinsi;
use App\Pesantren;
use Session;
use Auth;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Queue\Jobs\SyncJob;

class PesantrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesantren = Pesantren::orderBy('created_at', 'desc')->get();
        return view('admin.pesantren.index', compact('pesantren'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.pesantren.create', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesantren = new Pesantren;
        $pesantren->judul = $request->judul;
        $pesantren->slug = Str::slug($request->judul, '-');
        $pesantren->konten = $request->konten;
        $pesantren->alamat = $request->alamat;
        $pesantren->telepon = $request->telepon;
        $pesantren->email = $request->email;
        $pesantren->id_provinsi = $request->provinsi_id;
        $pesantren->id_user = Auth::user()->id; 
        # Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path().'/assets/img/ponpes/';
            $filename = $file->getClientOriginalName();
            $upload = $file->move($path, $filename);
            $pesantren->foto = $filename;
        }
        $pesantren->save();
        
        return redirect()->route('pesantren.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesantren = Pesantren::findOrFail($id);
        $provinsi = Provinsi::all();
       
        return view('admin.pesantren.show', compact('pesantren', 'provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesantren = Pesantren::findOrFail($id);
        $provinsi = Provinsi::all();
       
        return view('admin.pesantren.edit', compact('pesantren', 'provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'judul' => 'required|unique:pesantrens',
        //     'konten' => 'required|min:50',
        //     'foto' => 'required|mimes:jpeg.jpg.png.gif|required|max:2048',
        //     'id_provinsi' => 'required',
        //     'tag_id' => 'required']);

        $pesantren = Pesantren::findOrFail($id);
        $pesantren->judul = $request->judul;
        $pesantren->slug = Str::slug($request->judul, '-');
        $pesantren->konten = $request->konten;
        $pesantren->alamat = $request->alamat;
        $pesantren->telepon = $request->telepon;
        $pesantren->email = $request->email;
        $pesantren->id_user = Auth::user()->id;
        $pesantren->id_provinsi = $request->id_provinsi;

        // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/img/ponpes';
            $filename = str_random(6) . '_'
                . $file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            // hapus foto lama jika ada
            if ($pesantren->foto) {
                $old_foto = $pesantren->foto;
                $filepath = public_path() .
                    '/assets/img//' .
                    $pesantren->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // file sudah dihapus/tidak ada
                }
            }
            $pesantren->foto = $filename;
        }
        $pesantren->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil edit <b>"
                . $pesantren->judul . "</b>"
        ]);
        return redirect()->route('pesantren.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesantren = Pesantren::findOrFail($id);
        if ($pesantren->foto) {
            $old_foto = $pesantren->foto;
            $filepath = public_path() . '/assets/img/ponpes/' . $pesantren->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) { }
        }

      
        $pesantren->delete();
        Session::flash("flash_notification", [
            "level" => "danger",
            "message" => "Berhasil menghapus data pesantren berjudul <b>$pesantren->judul</b>!"
        ]);
        return redirect()->route('pesantren.index');
    }
}