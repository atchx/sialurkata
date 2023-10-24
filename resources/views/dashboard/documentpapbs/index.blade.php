@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            @if (session()->has('success'))
            <div class="alert alert-success fade show" role="alert">{{ session('success') }}</div>
            @endif
            <div class="card-header">Dokumen Kelengkapan Ranperda Tentang Perubahan APBD dan Ranperkada Tentang Penjabaran Perubahan APBD
                @if (auth()->user()->roles == 'User')
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <div role="group" class="btn-group-sm btn-group">
                            <a href="/dashboard/documentpapbs/create" class="btn-wide btn btn-success">Tambah Dokumen +</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Kabupaten</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($keputusans as $keputusan)
                        <tr>
                            <td class="text-center text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{ $keputusan->users->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $keputusan->tahun }}</td>
                            <td class="text-center">
                                @if ($keputusan->dokumen != null)
                                <a href="{{ asset('storage/' . $keputusan->dokumen) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                @else
                                <div class="badge badge-warning">Pending</div>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/dashboard/documentpapbs/{{ $keputusan->id }}" class="btn btn-primary btn-sm">Details</a>
                                @if (auth()->user()->roles == 'Admin')
                                @if ($keputusan->dokumen == null)
                                <a href="/dashboard/documentpapbs/papbs/{{ $keputusan->id }}/edit" class="btn btn-warning btn-sm">Upload</a>
                                @else
                                <form action="/dashboard/documentpapbs/papbs/{{ $keputusan->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" id="delete" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                                </form>   
                                @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection