<?php

namespace App\Http\Controllers;

use App\Models\Keputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function show(Keputusan $keputusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keputusan $pj)
    {
        return view('dashboard.documentpjs.pjs.edit', [
            'keputusan' => $pj
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keputusan $pj)
    {
        if ($request->file('dokumen')) {
            Storage::delete($pj->files);
            $validatedKeputusan['dokumen'] = $request->file('dokumen')->store('documents');
        }
        Keputusan::where('id', $pj->id)->update($validatedKeputusan);
        return redirect('/dashboard/documentpjs/')->with('success','Dokumen berhasil ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keputusan $pj)
    {
        if ($pj->dokumen) {
            Storage::delete($pj->dokumen);
        }
        $validatedKeputusan['dokumen'] = null;
        Keputusan::where('id', $pj->id)->update($validatedKeputusan);

        return redirect('/dashboard/documentpjs/')->with('success','Dokumen berhasil dihapus!');
    }
}
