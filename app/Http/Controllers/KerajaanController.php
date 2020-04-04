<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Kerajaan;
use Session; 
use DB;
use File;

class KerajaanController extends Controller
    
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kerajaan = kerajaan::all();
        return view('admin.kerajaan.index', compact('kerajaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.kerajaan.create', compact('kerajaan'));
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
            'nama_kerajaan' => 'required',
           
       ]);
      $kerajaan = new kerajaan();
      $kerajaan->nama_kerajaan = $request->nama_kerajaan;
      $kerajaan->slug = Str::slug($request->nama_kerajaan, '-');
      $kerajaan->konten = $request->konten;

      // foto
      if ($request->hasFile('foto')) {
          $file = $request->file('foto');
          $path = public_path() . '/assets/img/kerajaan';
          $filename = $file->getClientOriginalName();
          $upload = $file->move(
              $path,
              $filename
          );
          $kerajaan->foto = $filename;
      }
      $kerajaan->save();
      Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil menyimpan <b>"
              . $kerajaan->judul . "</b>"
      ]);
      return redirect()->route('kerajaan.index');
  
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
        $kerajaan = kerajaan::findOrfail($id);
        return view('admin.kerajaan.edit',compact('kerajaan'));
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
        $kerajaan = kerajaan::findOrFail($id);
        $kerajaan->nama_kerajaan = $request->nama_kerajaan;
        $kerajaan->slug = Str::slug($request->nama_kerajaan, '-');
        $kerajaan->konten = $request->konten;
       
        // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() . '/assets/img/kerajaan';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            // hapus foto lama jika ada
            if ($kerajaan->foto) {
                $old_foto = $kerajaan->foto;
                $filepath = public_path() .
                    '/assets/img//' .
                    $kerajaan->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // file sudah dihapus/tidak ada
                }
            }
            $kerajaan->foto = $filename;
        }
        $kerajaan->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil edit <b>"
                . $kerajaan->nama_kerajaan . "</b>"
        ]);
        return redirect()->route('kerajaan.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kerajaan = kerajaan::findOrFail($id);
        if ($kerajaan->foto) {
            $old_foto = $kerajaan->foto;
            $filepath = public_path() . '/assets/img/kerajaan/' . $kerajaan->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) { }
        }

      
        $kerajaan->delete();
        Session::flash("flash_notification", [
            "level" => "danger",
            "message" => "Berhasil menghapus data kerajaan berjudul <b>$kerajaan->judul</b>!"
        ]);
        return redirect()->route('kerajaan.index');
    
    }
}
