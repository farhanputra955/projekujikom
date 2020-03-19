<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Gallery;
use Session;
use File;
use Illuminate\Queue\Jobs\SyncJob;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::orderBy('created_at', 'desc')->get();
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.gallery.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = new gallery;
        $gallery->judul = $request->judul;
        $gallery->slug = Str::slug($request->judul, '-');
        $gallery->konten = $request->konten;
        # Foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path().'/assets/img/ponpes/';
            $filename = $file->getClientOriginalName();
            $upload = $file->move($path, $filename);
            $gallery->foto = $filename;
        }
        $gallery->save();
        
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = gallery::findOrFail($id);
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
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
        //     'judul' => 'required|unique:gallerys',
        //     'konten' => 'required|min:50',
        //     'foto' => 'required|mimes:jpeg.jpg.png.gif|required|max:2048',
        //     'id_kategori' => 'required',
        //     'tag_id' => 'required']);

        $gallery = gallery::findOrFail($id);
        $gallery->judul = $request->judul;
        $gallery->slug = Str::slug($request->judul, '-');
        $gallery->konten = $request->konten;
        $gallery->id_user = Auth::user()->id;
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
            if ($gallery->foto) {
                $old_foto = $gallery->foto;
                $filepath = public_path() .
                    '/assets/img/ponpes/' .
                    $gallery->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // file sudah dihapus/tidak ada
                }
            }
            $gallery->foto = $filename;
        }
        $gallery->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil edit <b>"
                . $gallery->judul . "</b>"
        ]);
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = gallery::findOrFail($id);
        if ($gallery->foto) {
            $old_foto = $gallery->foto;
            $filepath = public_path() . '/assets/img/ponpes/' . $gallery->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) { }
        }
        $gallery->delete();
        Session::flash("flash_notification", [
            "level" => "danger",
            "message" => "Berhasil menghapus data gallery berjudul <b>$gallery->judul</b>!"
        ]);
        return redirect()->route('gallery.index');
    }
}
