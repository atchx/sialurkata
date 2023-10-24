<?php

namespace App\Http\Controllers;

use App\Models\Keputusan;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeputusanPjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles == 'Admin') {
            return view('dashboard.keputusanpjs.index', [
                'keputusans' => Keputusan::where('jenis', 'Pertanggung Jawab')->get()
            ]);
        } else {
            return view('dashboard.keputusanpjs.index', [
                'keputusans' => Keputusan::where('user_id', auth()->user()->id)->where('jenis', 'Pertanggung Jawab')->get()
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
    public function show(Keputusan $keputusanpj)
    {
        return view('dashboard.documentpjs.print', [
            'documents' => Document::where('keputusan_id', $keputusanpj->id)->get(),
            'keputusan' => $keputusanpj
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keputusan $keputusanpj)
    {
        return view('dashboard.keputusanpjs.edit', [
            'keputusan' => $keputusanpj
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keputusan $keputusanpj)
    {
        $validatedKeputusan = $request->validate([
            'files' => 'required|file|mimes:pdf'
        ]);

        if ($request->file('files')) {
            $validatedKeputusan['files'] = $request->file('files')->store('keputusan');
        }
        Keputusan::where('id', $keputusanpj->id)->update($validatedKeputusan);
        return redirect('/dashboard/keputusanpjs')->with('success','Keputusan Gubernur berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keputusan $keputusanpj)
    {
        if ($keputusanpj->files != null) {
            if ($keputusanpj->files) {
                Storage::delete($keputusanpj->files);
            }
            $validatedKeputusan['files'] = null;
            Keputusan::where('id', $keputusanpj->id)->update($validatedKeputusan);
    
            return redirect('/dashboard/keputusanpjs')->with('success','Keputusan Gubernur berhasil dihapus!');
        } else {
            Document::where('keputusan_id', $keputusanpj->id)->delete();
            Keputusan::destroy($keputusanpj->id);
            return redirect('/dashboard/keputusanpjs')->with('success','Keputusan Gubernur berhasil dihapus!');
        }
        
    }
}
