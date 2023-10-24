<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Keputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentPapbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles == 'Admin') {
            return view('dashboard.documentpapbs.index', [
                'keputusans' => Keputusan::where('jenis', 'PAPB')->get()
            ]);
        } else {
            return view('dashboard.documentpapbs.index', [
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
        return view('dashboard.documentpapbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Keputusan::where('user_id', auth()->user()->id)->where('jenis', 'PAPB')->where('tahun', $request->tahun)->first();
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

            return redirect('/dashboard/documentpapbs/' . $check->id)->with('success','Dokumen berhasil ditambah!');
        } else {
            $validatedKeputusan = $request->validate([
                'tahun' => 'required'
            ]);
            $validatedKeputusan['user_id'] = auth()->user()->id;
            $validatedKeputusan['jenis'] = 'PAPB';

            Keputusan::create($validatedKeputusan);

            $doublecheck = Keputusan::where('user_id', auth()->user()->id)->where('jenis', 'PAPB')->where('tahun', $request->tahun)->first();
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

            return redirect('/dashboard/documentpapbs/' . $doublecheck->id)->with('success','Dokumen berhasil ditambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Keputusan $documentpapb)
    {
        return view('dashboard.documentpapbs.details', [
            'documents' => Document::where('keputusan_id', $documentpapb->id)->get(),
            'keputusan' => $documentpapb
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $documentpapb)
    {
        return view('dashboard.documentpapbs.edit', [
            'document' => $documentpapb
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $documentpapb)
    {
        if (auth()->user()->roles == 'Admin') {
            if ($request->keterangan) {
                $validatedDocument['keterangan'] = $request->keterangan;
            }
            Document::where('id', $documentpapb->id)->update($validatedDocument);
        } else {
            $validatedDocument = $request->validate([
                'name' => 'required',
                'files' => 'file|mimes:pdf,rar,zip'
            ]);
            if ($request->file('files')) {
                Storage::delete($documentpapb->files);
                $validatedDocument['files'] = $request->file('files')->store('documents');
            }
            if ($request->file('files') == null) {
                Storage::delete($documentpapb->files);
                $validatedDocument['files'] = null;
            }
            Document::where('id', $documentpapb->id)->update($validatedDocument);
        }
        return redirect('/dashboard/documentpapbs/' . $documentpapb->keputusan_id)->with('success','Dokumen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $documentpapb)
    {
        if ($documentpapb->files) {
            Storage::delete($documentpapb->files);
        }
        Document::destroy($documentpapb->id);

        return redirect('/dashboard/documentpapbs/' . $documentpapb->keputusan_id)->with('success','Dokumen berhasil dihapus!');
    }
}
