<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Doaseharihari;
use Session;
use Auth;

class DoaseharihariController extends Controller
{
    public function index()
    {
        $doaseharihari = doaseharihari::orderBy('created_at', 'desc')->get();
        return view('admin.doaseharihari.index', compact('doaseharihari'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doaseharihari = doaseharihari::all();
        return view('admin.doaseharihari.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doaseharihari = new doaseharihari();
        $doaseharihari->nama_doa = $request->doa;
        $doaseharihari->slug = Str::slug($request->doa, '-');
        $doaseharihari->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menyimpan doaseharihari <b>$doaseharihari->nama</b>!"
        ]);
        return redirect()->route('doaseharihari.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doaseharihari = doaseharihari::findOrFail($id);
        return view('admin.doaseharihari.show', compact('doaseharihari'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doaseharihari = doaseharihari::findOrFail($id);
        return view('admin.doaseharihari.edit', compact('doaseharihari'));
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
        $doaseharihari = doaseharihari::findOrFail($id);
        $doaseharihari->nama_doa = $request->nama;
        $doaseharihari->slug = Str::slug($request->nama, '-');
        $doaseharihari->save();
        Session::flash("flash_notification", [
            "level" => "primary",
            "message" => "Berhasil mengubah menjadi doaseharihari <b>$doaseharihari->nama</b>!"
        ]);
        return redirect()->route('doaseharihari.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doaseharihari = doaseharihari::findOrFail($id);
        $old = $doaseharihari->nama_doa;
        $doaseharihari->delete();
        return redirect()->route('doaseharihari.index');
    }

}
