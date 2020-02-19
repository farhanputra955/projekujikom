<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Berdoa;
use Session; 

class BerdoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berdoa = berdoa::all();
        return view('admin.berdoa.index', compact('berdoa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.berdoa.create', compact('berdoa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $berdoa = new berdoa;
        $berdoa->judul = $request->judul;
        $berdoa->slug = Str::slug($request->judul, '-');
        $berdoa->arab = $request->arab;
        $berdoa->latin = $request->latin;
        $berdoa->arti = $request->arti;
        $berdoa->save();
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "Berhasil menyimpan<b>"
                         . $berdoa->judul
                         . $berdoa->arab
                         . $berdoa->latin
                         . $berdoa->arti."</b>"
        ]);
        return redirect()->route('berdoa.index');
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
        $berdoa = berdoa::findOrfail($id);
        return view('admin.berdoa.edit',compact('berdoa'));
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
        $berdoa = berdoa::findOrFail($id);
        $berdoa->judul = $request->judul;
        $berdoa->slug = Str::slug($request->judul, '-');
        $berdoa->arab = $request->arab;
        $berdoa->latin = $request->latin;
        $berdoa->arti = $request->arti;
        $berdoa->save();
        return redirect()->route('berdoa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berdoa = berdoa::findOrFail($id);
        $berdoa->kopetensi_kode = $berdoa->kopetensi_kode;
        $berdoa->bidang_kode = $berdoa->bidang_kode;
        $berdoa->kopetensi_arab = $berdoa->kopetensi_arab;
        $berdoa->delete();
        return redirect()->route('berdoa.index');
    }
}
