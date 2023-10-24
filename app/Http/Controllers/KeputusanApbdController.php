<?php

namespace App\Http\Controllers;

use App\Models\Keputusan;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;


class KeputusanApbdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles == 'Admin') {
            return view('dashboard.keputusanapbds.index', [
                'keputusans' => Keputusan::where('jenis','APBD')->get()
            ]);
        } else {
            return view('dashboard.keputusanapbds.index', [
                'keputusans' => Keputusan::where('user_id', auth()->user()->id)->where('jenis','APBD')->get()
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
    public function show(Keputusan $keputusanapbd)
    {
        return view('dashboard.documentapbds.print', [
            'documents' => Document::where('keputusan_id', $keputusanapbd->id)->get(),
            'keputusan' => $keputusanapbd
        ]);

        // $html =  view('dashboard.documentapbds.print', [
        //     'documents' => Document::where('keputusan_id', $keputusanapbd->id)->get(),
        //     'keputusan' => $keputusanapbd
        // ]);
        // // instantiate and use the dompdf class
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml($html);
        
        // // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'potrait');

        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF to Browser
        // $dompdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */

    // public function edit(Keputusan $keputusan) funtion dan model binding default Resource Controller
    public function edit(Keputusan $keputusanapbd) //funtion dan model binding kasus saya
    {
        return view('dashboard.keputusanapbds.edit', [
            'keputusan' => $keputusanapbd
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keputusan $keputusanapbd)
    {
        $validatedKeputusan = $request->validate([
            'files' => 'required|file|mimes:pdf'
        ]);

        if ($request->file('files')) {
            $validatedKeputusan['files'] = $request->file('files')->store('keputusan');
        }
        Keputusan::where('id', $keputusanapbd->id)->update($validatedKeputusan);
        return redirect('/dashboard/keputusanapbds')->with('success','Keputusan Gubernur berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keputusan $keputusanapbd)
    {
        if ($keputusanapbd->files != null) {
            if ($keputusanapbd->files) {
                Storage::delete($keputusanapbd->files);
            }
            $validatedKeputusan['files'] = null;
            Keputusan::where('id', $keputusanapbd->id)->update($validatedKeputusan);
    
            return redirect('/dashboard/keputusanapbds')->with('success','Keputusan Gubernur berhasil dihapus!');
        } else {
            Document::where('keputusan_id', $keputusanapbd->id)->delete();
            Keputusan::destroy($keputusanapbd->id);
            return redirect('/dashboard/keputusanapbds')->with('success','Keputusan Gubernur berhasil dihapus!');
        }
        
    }
}
