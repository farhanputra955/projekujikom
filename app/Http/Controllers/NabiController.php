<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\kisah;
use App\nabi;
use Session;
use Auth;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Queue\Jobs\SyncJob;

class NabiController extends Controller
{
    public function index()
    {
        $nabi = nabi::orderBy('created_at', 'desc')->get();
        return view('admin.nabi.index', compact('nabi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kisah = kisah::all();
        return view('admin.nabi.create', compact('kisah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nabi = new nabi;
        $nabi->nama_nabi = $request->nama_nabi;
        $nabi->slug = Str::slug($request->nama_nabi, '-');
        $nabi->konten = $request->konten;
        $nabi->id_kisah = $request->kisah_id;
        $nabi->id_user = Auth::user()->id; 
        # Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path().'/assets/img/kisah/';
            $filename = $file->getClientOriginalName();
            $upload = $file->move($path, $filename);
            $nabi->foto = $filename;
        }
        $nabi->save();
        
        return redirect()->route('nabi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nabi = nabi::findOrFail($id);
        $kisah = kisah::all();
       
        return view('admin.nabi.show', compact('nabi', 'kisah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nabi = nabi::findOrFail($id);
        $kisah = kisah::all();
       
        return view('admin.nabi.edit', compact('nabi', 'kisah'));
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
        //     'judul' => 'required|unique:nabis',
        //     'konten' => 'required|min:50',
        //     'foto' => 'required|mimes:jpeg.jpg.png.gif|required|max:2048',
        //     'id_kisah' => 'required',
        //     'tag_id' => 'required']);

        $nabi = nabi::findOrFail($id);
        $nabi->judul = $request->judul;
        $nabi->slug = Str::slug($request->judul, '-');
        $nabi->konten = $request->konten;
        $nabi->alamat = $request->alamat;
        $nabi->telepon = $request->telepon;
        $nabi->email = $request->email;
        $nabi->website = $request->website;
        $nabi->maps = $request->maps;
        $nabi->id_user = Auth::user()->id;
        $nabi->id_kisah = $request->id_kisah;

        // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/img/kisah';
            $filename = str_random(6) . '_'
                . $file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            // hapus foto lama jika ada
            if ($nabi->foto) {
                $old_foto = $nabi->foto;
                $filepath = public_path() .
                    '/assets/img//' .
                    $nabi->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // file sudah dihapus/tidak ada
                }
            }
            $nabi->foto = $filename;
        }
        $nabi->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil edit <b>"
                . $nabi->judul . "</b>"
        ]);
        return redirect()->route('nabi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nabi = nabi::findOrFail($id);
        if ($nabi->foto) {
            $old_foto = $nabi->foto;
            $filepath = public_path() . '/assets/img/kisah/' . $nabi->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) { }
        }

      
        $nabi->delete();
        Session::flash("flash_notification", [
            "level" => "danger",
            "message" => "Berhasil menghapus data nabi berjudul <b>$nabi->judul</b>!"
        ]);
        return redirect()->route('nabi.index');
    }
}
