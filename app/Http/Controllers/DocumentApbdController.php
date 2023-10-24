<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Keputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentApbdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles == 'Admin') {
            return view('dashboard.documentapbds.index', [
                'keputusans' => Keputusan::where('jenis', 'APBD')->get()
            ]);
        } else {
            return view('dashboard.documentapbds.index', [
                'keputusans' => Keputusan::where('user_id', auth()->user()->id)->where('jenis', 'APBD')->get()
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
        return view('dashboard.documentapbds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Keputusan::where('user_id', auth()->user()->id)->where('jenis', 'APBD')->where('tahun', $request->tahun)->first();
        if ($check != null) {
            $validatedDocument = $request->validate([
                'name' => 'required',
                'files' => 'file|mimes:pdf,rar,zip'
            ]);
            if ($request->nomor) {
                $validatedDocument['nomor'] = $request->nomor;
            }
            $validatedDocument['keputusan_id'] = $check->id;

            if ($request->file('files')) {
                $validatedDocument['files'] = $request->file('files')->store('documents');
            }
            Document::create($validatedDocument);

            return redirect('/dashboard/documentapbds/' . $check->id)->with('success','Dokumen berhasil ditambah!');
        } else {
            $validatedKeputusan = $request->validate([
                'tahun' => 'required'
            ]);
            $validatedKeputusan['user_id'] = auth()->user()->id;
            $validatedKeputusan['jenis'] = 'APBD';

            Keputusan::create($validatedKeputusan);

            $doublecheck = Keputusan::where('user_id', auth()->user()->id)->where('jenis', 'APBD')->where('tahun', $request->tahun)->first();
            $validatedDocument = $request->validate([
                'name' => 'required',
                'files' => 'file|mimes:pdf,rar,zip'
            ]);
            if ($request->nomor) {
                $validatedDocument['nomor'] = $request->nomor;
            }
            $validatedDocument['keputusan_id'] = $doublecheck->id;

            if ($request->file('files')) {
                $validatedDocument['files'] = $request->file('files')->store('documents');
            }
            Document::create($validatedDocument);

            return redirect('/dashboard/documentapbds/' . $doublecheck->id)->with('success','Dokumen berhasil ditambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Keputusan $documentapbd)
    {
        return view('dashboard.documentapbds.details', [
            'documents' => Document::where('keputusan_id', $documentapbd->id)->get(),
            'keputusan' => $documentapbd
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $documentapbd)
    {
        return view('dashboard.documentapbds.edit', [
            'document' => $documentapbd
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $documentapbd)
    {
        if (auth()->user()->roles == 'Admin') {
            if ($request->keterangan) {
                $validatedDocument['keterangan'] = $request->keterangan;
            }
            Document::where('id', $documentapbd->id)->update($validatedDocument);
        } else {
            $validatedDocument = $request->validate([
                'name' => 'required',
                'files' => 'file|mimes:pdf,rar,zip'
            ]);
            if ($request->file('files')) {
                Storage::delete($documentapbd->files);
                $validatedDocument['files'] = $request->file('files')->store('documents');
            }
            if ($request->file('files') == null) {
                Storage::delete($documentapbd->files);
                $validatedDocument['files'] = null;
            }
            Document::where('id', $documentapbd->id)->update($validatedDocument);
        }
        return redirect('/dashboard/documentapbds/' . $documentapbd->keputusan_id)->with('success','Dokumen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $documentapbd)
    {
        if ($documentapbd->files) {
            Storage::delete($documentapbd->files);
        }
        Document::destroy($documentapbd->id);

        return redirect('/dashboard/documentapbds/' . $documentapbd->keputusan_id)->with('success','Dokumen berhasil dihapus!');
    }
}
