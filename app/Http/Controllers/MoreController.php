<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Doaseharihari;
use App\More;
use Session;
use Auth;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Queue\Jobs\SyncJob;

class MoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $more = more::all();
        return view('admin.more.index', compact('more'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doaseharihari = doaseharihari::all();
        return view('admin.more.create', compact('doaseharihari'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $more = new more;
        $more->berdoa = $request->berdoa;
        $more->slug = Str::slug($request->berdoa, '-');
        $more->arab = $request->arab;
        $more->latin = $request->latin;
        $more->arti = $request->arti;
        $more->id_doaseharihari = $request->doaseharihari_id;
        $more->id_user = Auth::user()->id; 
        $more->save();
        
        return redirect()->route('more.index');
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
        $more = more::findOrfail($id);
        return view('admin.more.edit',compact('more'));
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
        $more = more::findOrFail($id);
        $more->berdoa = $request->berdoa;
        $more->slug = Str::slug($request->berdoa, '-');
        $more->arab = $request->arab;
        $more->latin = $request->latin;
        $more->arti = $request->arti;
        $more->save();
        return redirect()->route('more.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $more = more::findOrFail($id);
        $more->kopetensi_kode = $more->kopetensi_kode;
        $more->bidang_kode = $more->bidang_kode;
        $more->kopetensi_arab = $more->kopetensi_arab;
        $more->delete();
        return redirect()->route('more.index');
    }
}
