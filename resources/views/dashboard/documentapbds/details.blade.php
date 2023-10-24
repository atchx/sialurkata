@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            @if (session()->has('success'))
            <div class="alert alert-success fade show" role="alert">{{ session('success') }}</div>
            @endif
            <div class="card-header">Dokumen Kelengkapan RANPERDA TENTANG APBD DAN RANPERKADA TENTANG PENJABARAN APBD {{ $keputusan->users->name }} {{ $keputusan->tahun }}
                @if (auth()->user()->roles == 'User')
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <div role="group" class="btn-group-sm btn-group">
                            <a href="/dashboard/documentapbds/create" class="btn-wide btn btn-success">Tambah Dokumen +</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Dokumen</th>
                        <th class="text-center">File</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                        <tr>
                            <td class="text-center text-muted">{{ $document->nomor }}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $document->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                            @if ($document->files != null)
                            <a href="{{ asset('storage/' . $document->files) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                            @else
                            <div class="badge badge-warning">Tidak Ada</div>
                            @endif
                            </td>
                            <td class="text-center">{{ $document->keterangan }}</td>
                            <td class="text-center">
                                @if (auth()->user()->roles == 'Admin')
                                <a href="/dashboard/documentapbds/{{ $document->id }}/edit" class="btn btn-primary btn-sm">Verifikasi</a>
                                @else
                                <a href="/dashboard/documentapbds/{{ $document->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                @endif
                                <form action="/dashboard/documentapbds/{{ $document->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" id="delete" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <a href="/dashboard/documentapbds" class="btn-wide btn btn-warning">Kembali</a>
                @if (auth()->user()->roles == 'Admin')
                <a href="/dashboard/keputusanapbds/{{ $keputusan->id }}" target="_blank" class="btn btn-success btn-sm">Print</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection