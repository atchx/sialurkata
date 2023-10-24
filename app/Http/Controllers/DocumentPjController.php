<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Keputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentPjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles == 'Admin') {
            return view('dashboard.documentpjs.index', [
                'keputusans' => Keputusan::where('jenis', 'Pertanggung Jawab')->get()
            ]);
        } else {
            return view('dashboard.documentpjs.index', [
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
        return view('dashboard.documentpjs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Keputusan::where('user_id', auth()->user()->id)->where('jenis', 'Pertanggung Jawab')->where('tahun', $request->tahun)->first();

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
            return redirect('/dashboard/documentpjs/' . $check->id)->with('success','Dokumen berhasil ditambah!');
        } else {
            $validatedKeputusan = $request->validate([
                'tahun' => 'required'
            ]);
            $validatedKeputusan['user_id'] = auth()->user()->id;
            $validatedKeputusan['jenis'] = 'Pertanggung Jawab';

            Keputusan::create($validatedKeputusan);

            $doublecheck = Keputusan::where('user_id', auth()->user()->id)->where('jenis', 'Pertanggung Jawab')->where('tahun', $request->tahun)->first();
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
            return redirect('/dashboard/documentpjs/' . $doublecheck->id)->with('success','Dokumen berhasil ditambah!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Keputusan $documentpj)
    {
        return view('dashboard.documentpjs.details', [
            'documents' => Document::where('keputusan_id', $documentpj->id)->get(),
            'keputusan' => $documentpj
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $documentpj)
    {
        return view('dashboard.documentpjs.edit', [
            'document' => $documentpj
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $documentpj)
    {
        if (auth()->user()->roles == 'Admin') {
            if ($request->keterangan) {
                $validatedDocument['keterangan'] = $request->keterangan;
            }
            Document::where('id', $documentpj->id)->update($validatedDocument);
        } else {
            $validatedDocument = $request->validate([
                'name' => 'required',
                'files' => 'file|mimes:pdf,rar,zip'
            ]);
            if ($request->file('files')) {
                Storage::delete($documentpj->files);
                $validatedDocument['files'] = $request->file('files')->store('documents');
            }
            if ($request->file('files') == null) {
                Storage::delete($documentpj->files);
                $validatedDocument['files'] = null;
            }
            Document::where('id', $documentpj->id)->update($validatedDocument);
        }
        return redirect('/dashboard/documentpjs/' . $documentpj->keputusan_id)->with('success','Dokumen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $documentpj)
    {
        if ($documentpj->files) {
            Storage::delete($documentpj->files);
        }
        Document::destroy($documentpj->id);

        return redirect('/dashboard/documentpjs/' . $documentpj->keputusan_id)->with('success','Dokumen berhasil dihapus!');
    }
}
