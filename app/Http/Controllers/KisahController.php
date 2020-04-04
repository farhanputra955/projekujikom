<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Kisah;
use Session;
use Auth;
use DB;

class KisahController extends Controller
{
    public function index()
    {
        $kisah = kisah::orderBy('created_at', 'desc')->get();
        return view('admin.kisah.index', compact('kisah'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kisah = kisah::all();
        return view('admin.kisah.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kisah = new kisah();
        $kisah->nama_kisah = $request->kisah;
        $kisah->slug = Str::slug($request->kisah, '-');
        $kisah->save();
        
        return redirect()->route('kisah.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kisah = kisah::findOrFail($id);
        return view('admin.kisah.show', compact('kisah'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kisah = kisah::findOrFail($id);
        return view('admin.kisah.edit', compact('kisah'));
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
        //
        $request->validate([
            'nama_kisah' => 'required',
        ]);
        $kisah = kisah::findOrFail($id);
        $kisah->nama_kisah = $request->nama_kisah;
        $kisah->slug = Str::slug($request->nama_kisah, '-');
        $kisah->save();
        Session::flash("flash_notification", [
            "level" => "primary",
            "message" => "Berhasil mengubah menjadi kisah <b>$kisah->nama</b>!"
        ]);
        return redirect()->route('kisah.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kisah = kisah::findOrFail($id);
        $old = $kisah->nama_kisah;
        $kisah->delete();
        return redirect()->route('kisah.index');
    }

}
