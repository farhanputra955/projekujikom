<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Doa;
use App\DoaHarian;
use Session;
use Auth;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Queue\Jobs\SyncJob;

class DoaHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doaharian = doaharian::all();
        return view('admin.doaharian.index', compact('doaharian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doa = doa::all();
        return view('admin.doaharian.create', compact('doa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doaharian = new doaharian;
        $doaharian->judul = $request->judul;
        $doaharian->slug = Str::slug($request->judul, '-');
        $doaharian->arab = $request->arab;
        $doaharian->latin = $request->latin;
        $doaharian->arti = $request->arti;
        $doaharian->id_doa = $request->doa_id;
        $doaharian->id_user = Auth::user()->id; 
        $doaharian->save();
        
        return redirect()->route('doaharian.index');
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
        $doaharian = doaharian::findOrfail($id);
        return view('admin.doaharian.edit',compact('doaharian'));
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
        $doaharian = doaharian::findOrFail($id);
        $doaharian->judul = $request->judul;
        $doaharian->slug = Str::slug($request->judul, '-');
        $doaharian->arab = $request->arab;
        $doaharian->latin = $request->latin;
        $doaharian->arti = $request->arti;
        $doaharian->save();
        return redirect()->route('doaharian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doaharian = doaharian::findOrFail($id);
        $doaharian->kopetensi_kode = $doaharian->kopetensi_kode;
        $doaharian->bidang_kode = $doaharian->bidang_kode;
        $doaharian->kopetensi_arab = $doaharian->kopetensi_arab;
        $doaharian->delete();
        return redirect()->route('doaharian.index');
    }
}
