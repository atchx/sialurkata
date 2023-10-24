<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Keputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles == 'Admin') {
            return view('dashboard.reports.index', [
                'reports' => Report::get()
            ]);
        } else {
            return view('dashboard.reports.index', [
                'reports' => Report::where('user_id', auth()->user()->id)->get()
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
        return view('dashboard.reports.create');
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

            $validatedReport = $request->validate([
                'files' => 'required|file|mimes:pdf,xls,xlsx'
            ]);
            $validatedReport['keputusan_id'] = $check->id;
            $validatedReport['user_id'] = auth()->user()->id;
    
            if ($request->file('files')) {
                $validatedReport['files'] = $request->file('files')->store('results');
            }
            Report::create($validatedReport);
    
            return redirect('/dashboard/reports')->with('success','Laporan Realisasi berhasil ditambah!');
        }

        return redirect('/dashboard/reports')->with('success','Gagal ditambah. Tahun dan Jenis Tidak Sesuai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        if ($report->files) {
            Storage::delete($report->files);
        }
        Report::destroy($report->id);

        return redirect('/dashboard/reports')->with('success','Laporan Realisasi berhasil dihapus!');
    }
}
