<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Keputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles == 'Admin') {
            return view('dashboard.results.index', [
                'results' => Result::get()
            ]);
        } else {
            return view('dashboard.results.index', [
                'results' => Result::where('user_id', auth()->user()->id)->get()
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
        return view('dashboard.results.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Keputusan::where('user_id', auth()->user()->id)->where('jenis', $request->jenis)->where('tahun', $request->tahun)->first();
        
        if ($check != null) {

            $validatedResult = $request->validate([
                'files' => 'required|file|mimes:pdf'
            ]);
            $validatedResult['keputusan_id'] = $check->id;
            $validatedResult['user_id'] = auth()->user()->id;
    
            if ($request->file('files')) {
                $validatedResult['files'] = $request->file('files')->store('results');
            }
            Result::create($validatedResult);
    
            return redirect('/dashboard/results')->with('success','Hasil Tindak Lanjut berhasil ditambah!');
        }

        return redirect('/dashboard/results')->with('success','Gagal ditambah. Tahun dan Jenis Tidak Sesuai');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        return view('dashboard.results.edit', [
            'result' => $result
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $validatedResult = $request->validate([
            'balasan' => 'required|file|mimes:pdf'
        ]);

        if ($request->file('balasan')) {
            $validatedResult['balasan'] = $request->file('balasan')->store('results');
        }
        Result::where('id', $result->id)->update($validatedResult);
        return redirect('/dashboard/results')->with('success','Balasan berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        if ($result->files) {
            Storage::delete($result->files);
        }
        if ($result->balasan) {
            Storage::delete($result->balasan);
        }
        Result::destroy($result->id);

        return redirect('/dashboard/results')->with('success','Hasil tindak lanjut berhasil dihapus!');
    }
}
