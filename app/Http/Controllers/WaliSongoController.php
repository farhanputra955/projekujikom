<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\WaliSongo;
use Session; 
use DB;
use File;


class WaliSongoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walisongo = walisongo::all();
        return view('admin.walisongo.index', compact('walisongo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.walisongo.create', compact('walisongo'));
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
            'nama_walisongo' => 'required',
           
       ]);
      $walisongo = new walisongo();
      $walisongo->nama_walisongo = $request->nama_walisongo;
      $walisongo->slug = Str::slug($request->nama_walisongo, '-');
      $walisongo->konten = $request->konten;
      // foto
      if ($request->hasFile('foto')) {
          $file = $request->file('foto');
          $path = public_path() . '/assets/img/walisongo';
          $filename = $file->getClientOriginalName();
          $upload = $file->move(
              $path,
              $filename
          );
          $walisongo->foto = $filename;
      }
      $walisongo->save();
      Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil menyimpan <b>"
              . $walisongo->judul . "</b>"
      ]);
      return redirect()->route('walisongo.index');
  
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
        $walisongo = walisongo::findOrfail($id);
        return view('admin.walisongo.edit',compact('walisongo'));
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
        $walisongo = walisongo::findOrFail($id);
        $walisongo->nama_walisongo = $request->nama_walisongo;
        $walisongo->slug = Str::slug($request->nama_walisongo, '-');
        $walisongo->konten = $request->konten;
       
        // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/img/walisongo';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            // hapus foto lama jika ada
            if ($walisongo->foto) {
                $old_foto = $walisongo->foto;
                $filepath = public_path() .
                    '/assets/img//' .
                    $walisongo->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // file sudah dihapus/tidak ada
                }
            }
            $walisongo->foto = $filename;
        }
        $walisongo->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil edit <b>"
                . $walisongo->judul . "</b>"
        ]);
        return redirect()->route('walisongo.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $walisongo = walisongo::findOrFail($id);
        if ($walisongo->foto) {
            $old_foto = $walisongo->foto;
            $filepath = public_path() . '/assets/img/walisongo/' . $walisongo->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) { }
        }

      
        $walisongo->delete();
        Session::flash("flash_notification", [
            "level" => "danger",
            "message" => "Berhasil menghapus data walisongo berjudul <b>$walisongo->judul</b>!"
        ]);
        return redirect()->route('walisongo.index');
    
    }
}
