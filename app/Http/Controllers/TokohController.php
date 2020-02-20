<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Tokoh;
use Session; 
use DB;
use Illuminate\Support\Facades\File;


class TokohController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokoh = tokoh::all();
        return view('admin.tokoh.index', compact('tokoh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tokoh.create', compact('tokoh'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'konten' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'nama_tokoh' => 'required',
           
       ]);
      $tokoh = new tokoh();
      $tokoh->nama_tokoh = $request->nama_tokoh;
      $tokoh->slug = Str::slug($request->nama_tokoh, '-');
      $tokoh->konten = $request->konten;
      // foto
      if ($request->hasFile('foto')) {
          $file = $request->file('foto');
          $path = public_path() . '/assets/img/tokoh';
          $filename = $file->getClientOriginalName();
          $upload = $file->move(
              $path,
              $filename
          );
          $tokoh->foto = $filename;
      }
      $tokoh->save();
      Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil menyimpan <b>"
              . $tokoh->judul . "</b>"
      ]);
      return redirect()->route('tokoh.index');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tokoh = tokoh::findOrfail($id);
        return view('admin.tokoh.edit',compact('tokoh'));
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
        $tokoh = tokoh::findOrFail($id);
        $tokoh->judul = $request->judul;
        $tokoh->slug = Str::slug($request->judul, '-');
        $tokoh->konten = $request->konten;
       
        // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/img/tokoh';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            // hapus foto lama jika ada
            if ($tokoh->foto) {
                $old_foto = $tokoh->foto;
                $filepath = public_path() .
                    '/assets/img//' .
                    $tokoh->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // file sudah dihapus/tidak ada
                }
            }
            $tokoh->foto = $filename;
        }
        $tokoh->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil edit <b>"
                . $tokoh->judul . "</b>"
        ]);
        return redirect()->route('tokoh.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tokoh = tokoh::findOrFail($id);
        if ($tokoh->foto) {
            $old_foto = $tokoh->foto;
            $filepath = public_path() . '/assets/img/tokoh/' . $tokoh->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) { }
        }

      
        $tokoh->delete();
        Session::flash("flash_notification", [
            "level" => "danger",
            "message" => "Berhasil menghapus data tokoh berjudul <b>$tokoh->judul</b>!"
        ]);
        return redirect()->route('tokoh.index');
    
    }
}
