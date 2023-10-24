<?php

namespace App\Http\Controllers;

use App\Models\Keputusan;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeputusanPapbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles == 'Admin') {
            return view('dashboard.keputusanpapbs.index', [
                'keputusans' => Keputusan::where('jenis', 'PAPB')->get()
            ]);
        } else {
            return view('dashboard.keputusanpapbs.index', [
                'keputusans' => Keputusan::where('user_id', auth()->user()->id)->where('jenis', 'PAPB')->get()
            ]);
        }
        
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
    public function show(Keputusan $keputusanpapb)
    {
        return view('dashboard.documentpapbs.print', [
            'documents' => Document::where('keputusan_id', $keputusanpapb->id)->get(),
            'keputusan' => $keputusanpapb
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keputusan $keputusanpapb)
    {
        return view('dashboard.keputusanpapbs.edit', [
            'keputusan' => $keputusanpapb
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keputusan $keputusanpapb)
    {
        $validatedKeputusan = $request->validate([
            'files' => 'required|file|mimes:pdf'
        ]);

        if ($request->file('files')) {
            $validatedKeputusan['files'] = $request->file('files')->store('keputusan');
        }
        Keputusan::where('id', $keputusanpapb->id)->update($validatedKeputusan);
        return redirect('/dashboard/keputusanpapbs')->with('success','Keputusan Gubernur berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keputusan $keputusanpapb)
    {
        if ($keputusanpapb->files != null) {
            if ($keputusanpapb->files) {
                Storage::delete($keputusanpapb->files);
            }
            $validatedKeputusan['files'] = null;
            Keputusan::where('id', $keputusanpapb->id)->update($validatedKeputusan);
    
            return redirect('/dashboard/keputusanpapbs')->with('success','Keputusan Gubernur berhasil dihapus!');
        } else {
            Document::where('keputusan_id', $keputusanpapb->id)->delete();
            Keputusan::destroy($keputusanpapb->id);
            return redirect('/dashboard/keputusanpapbs')->with('success','Keputusan Gubernur berhasil dihapus!');
        }
        
    }
}
