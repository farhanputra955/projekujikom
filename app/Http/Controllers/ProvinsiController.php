<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Provinsi;
use Session;
use Auth;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::orderBy('created_at', 'desc')->get();
        return view('admin.provinsi.index', compact('provinsi'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.provinsi.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provinsi = new Provinsi();
        $provinsi->nama_provinsi = $request->provinsi;
        $provinsi->slug = Str::slug($request->provinsi, '-');
        $provinsi->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menyimpan provinsi <b>$provinsi->nama</b>!"
        ]);
        return redirect()->route('provinsi.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.show', compact('provinsi'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.edit', compact('provinsi'));
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
            'nama' => 'required',
        ]);
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->nama_provinsi = $request->nama;
        $provinsi->slug = Str::slug($request->nama, '-');
        $provinsi->save();
        Session::flash("flash_notification", [
            "level" => "primary",
            "message" => "Berhasil mengubah menjadi provinsi <b>$provinsi->nama</b>!"
        ]);
        return redirect()->route('provinsi.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $old = $provinsi->nama_provinsi;
        $provinsi->delete();
        return redirect()->route('provinsi.index');
    }
}
