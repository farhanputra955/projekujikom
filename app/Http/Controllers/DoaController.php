<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Doa;
use Session;
use Auth;

class DoaController extends Controller
{
    public function index()
    {
        $doa = doa::orderBy('created_at', 'desc')->get();
        return view('admin.doa.index', compact('doa'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doa = doa::all();
        return view('admin.doa.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doa = new doa();
        $doa->nama_doa = $request->doa;
        $doa->slug = Str::slug($request->doa, '-');
        $doa->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menyimpan doa <b>$doa->nama</b>!"
        ]);
        return redirect()->route('doa.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doa = doa::findOrFail($id);
        return view('admin.doa.show', compact('doa'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doa = doa::findOrFail($id);
        return view('admin.doa.edit', compact('doa'));
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
        $doa = doa::findOrFail($id);
        $doa->nama_doa = $request->nama;
        $doa->slug = Str::slug($request->nama, '-');
        $doa->save();
        Session::flash("flash_notification", [
            "level" => "primary",
            "message" => "Berhasil mengubah menjadi doa <b>$doa->nama</b>!"
        ]);
        return redirect()->route('doa.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doa = doa::findOrFail($id);
        $old = $doa->nama_doa;
        $doa->delete();
        return redirect()->route('doa.index');
    }

}
